<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/7/2018
 * Time: 5:15 PM
 */

session_start();
include('../data/functions.php');
$logic = new functions();

$status = $_POST['status'];
$winner = $_POST['winner'];

$logic->setBiddingStatus($status);
if($winner) {
    $winners = $logic->getWinners();
    foreach ($winners as $winner){
        echo ('<b>'.$winner->getItem()->getName().' '. $winner->getItem()->getId()).'</b><br>';
        foreach ($winner->getWinnerBids() as $bid){
            echo(($logic->searchUser($bid->getPaddleNum()))->getName().' '.$bid->getQuantity().' '.$bid->getBidAmount()).'<br>';
        }
    }
} else{
    header('Location: ' . BASEURL . '/admin.php');
}

//

