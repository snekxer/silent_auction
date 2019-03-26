<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/6/2018
 * Time: 2:45 PM
 */

include('/var/www/php_auction/class/user.php');
include('/var/www/php_auction/class/item.php');
include('/var/www/php_auction/class/bid.php');
include('/var/www/php_auction/class/winner.php');

DEFINE('BASEURL','/php_auction');


class functions {

    private $db_conn;


    public function __construct() {
        $host = '';
        $db   = '';
        $user = '';
        $pass = '';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->db_conn = new PDO($dsn, $user, $pass, $opt);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getBiddingStatus(){
        $st = $this->db_conn -> prepare("SELECT bidding FROM status");
        $st -> execute();
        return($st -> fetch());
    }

    public function setBiddingStatus($bidding_status){
        $st = $this->db_conn -> prepare("UPDATE status SET bidding=:status");
        $st -> bindParam(':status', $bidding_status);
        return($st -> execute());
    }

    function searchUser($paddle_num){
        $st = $this->db_conn -> prepare("SELECT * FROM user WHERE paddle_num=:paddle");
        $st -> bindParam(':paddle', $paddle_num);
        $st -> execute();
        $data = $st -> fetch();
        if($st->rowCount() > 0){
            $user = new user();
            $user -> buildUser($data);
            return $user;
        } else {
            return false;
        }
    }

    function login($user){
        $_SESSION['user'] = serialize($user);
    }

    function logout(){
        session_unset();
        session_destroy();
    }

    function register($paddle_num, $name){
        $st = $this->db_conn -> prepare("INSERT INTO  user (paddle_num, name) VALUES (:paddle_num,:name)");
        $st -> bindParam(':paddle_num', $paddle_num);
        $st -> bindParam(':name', $name);
        $st -> execute();
        if($st -> fetch()){
            $this->login($this->searchUser($paddle_num));
        } else {
            return false;
        }
    }

    function searchItem($item_id){
        $st = $this->db_conn -> prepare("SELECT * FROM items WHERE id=:id");
        $st -> bindParam(':id', $item_id);
        $st -> execute();
        $data = $st -> fetch();
        if($st->rowCount() > 0){
            $item = new item();
            $item -> buildItem($data);
            return $item;
        } else {
            return false;
        }
    }

    function getAllItems(){
        $st = $this->db_conn -> prepare("SELECT * FROM items");
        $st -> execute();
        $data = $st -> fetchAll();
        if($data!=null){
            $i = 0;
            $items = [];
            foreach ($data as $data){
                $item = new item();
                $item->buildItem($data);
                $items[$i] = $item;
                unset($item);
                $i++;
            }
            return $items;
        } else {
            return false;
        }
    }

    function bid($item, $amount, $quantity) {
        if ($this->getBiddingStatus()['bidding']==1) {
            $amount = $amount / $quantity;
            if ($amount < $item->getMinBid()) {
                echo('Minimun bid amount is' . $item->getMinBid());
                return false;
            } else if ($this->checkBid($item->getId(), $amount, $quantity)) {
                echo('You have already bid this amount to this item!');
                return false;
            } else {
                $st = $this->db_conn->prepare("INSERT INTO bids (item_id, bid_amount, quantity, paddle_num) VALUES (:item, :amount, :quantity, :paddle)");
                $st->bindParam(':item', $item->getId());
                $st->bindParam(':amount', $amount);
                $st->bindParam(':quantity', $quantity);
                $st->bindParam(':paddle', unserialize($_SESSION['user'])->getPaddleNum());
                return ($st->execute());
            }
        } else {
            echo('Bidding is not available at the moment');
        }
    }

    function checkBid($item_id,$amount,$quantity){
        $st = $this->db_conn -> prepare("SELECT * FROM bids WHERE item_id=:item AND bid_amount=:amount AND quantity=:quantity AND paddle_num=:paddle");
        $st->bindParam(':item', $item_id);
        $st->bindParam(':amount', $amount);
        $st->bindParam(':quantity', $quantity);
        $st->bindParam(':paddle', unserialize($_SESSION['user'])->getPaddleNum());
        $st -> execute();
        $data = $st -> fetch();
        if($data!=null){
            return true;
        } else {
            return false;
        }
    }

    function getBidsFromItem($item){
        $st = $this->db_conn -> prepare("SELECT * FROM bids WHERE item_id=:item ORDER BY timestamp");
        $st->bindParam(':item', $item->getId());
        $st -> execute();
        $data = $st -> fetchAll();
        if($data!=null){
            $i = 0;
            $bids = [];
            foreach ($data as $data){
                $bid = new bid();
                $bid->buildBid($data);
                $bids[$i] = $bid;
                unset($bid);
                $i++;
            }
            return $bids;
        } else {
            return false;
        }
    }

    function getBidsFromUser(){
        $st = $this->db_conn -> prepare("SELECT * FROM bids WHERE paddle_num=:paddle");
        $st->bindParam(':paddle', unserialize($_SESSION['user'])->getPaddleNum());
        $st -> execute();
        $data = $st -> fetchAll();
        if($data!=null){
            $i = 0;
            $bids = [];
            foreach ($data as $data){
                $bid = new bid();
                $bid->buildBid($data);
                $bids[$i] = $bid;
                unset($bid);
                $i++;
            }
            return $bids;
        } else {
            return false;
        }
    }

    function getWinners(){
        $items = $this->getAllItems();
        $i = 0;
        $winners = [];
        foreach ($items as $item) {
            $winner = new winner($item);
            $winner->setWinnerBids($this->getWinnerFromItem($item));
            $winners[$i] = $winner;
            unset($winner);
            $i++;
        }
        return $winners;
    }

    function getWinnerFromItem($item){
        $st = $this->db_conn -> prepare("SELECT * FROM bids WHERE item_id=:item ORDER BY bid_amount,timestamp DESC");
        $st->bindParam(':item', $item->getId());
        $st->execute();
        $data = $st->fetchAll();
        if($data!=null){
            $i = 0;
            $bids = [];
            foreach ($data as $data){
                $bid = new bid();
                $bid->buildBid($data);
                $bids[$i] = $bid;
                unset($bid);
                $i++;
            }
            $i = 0;
        } else {
            return false;
        }
        $amount = $item->getAmount();
        $winner_bids = [];
        while($amount>0) {
            foreach ($bids as $bid) {
                $amount = $amount - $bid->getQuantity();
                if($amount>=0){
                    $winner_bids[$i] = $bid;
                }
            }
        }
        return $winner_bids;
    }

    function clearBids(){
        $st = $this->db_conn -> prepare("TRUNCATE bids");
        $st->execute();
    }
}
