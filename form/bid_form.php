<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/6/2018
 * Time: 5:17 PM
 */
session_start();

include("../data/functions.php");

$item_id = $_POST['item_id'];
$bid_amount = $_POST['bid_amount'];
$quantity = $_POST['quantity'];

$logic = new functions();

$item = $logic->searchItem($item_id);
if($logic->bid($item,$bid_amount,$quantity)){
    echo('Success!');
    header('Location: ' . BASEURL . '/bidsheet.php?id=' . $item->getId());
} else {
    echo('There was an error bidding. Please try again.');
}
