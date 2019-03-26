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

$logic = new functions();

$item = $logic->searchItem($item_id);
if($item!=false){
    header('Location: ' . BASEURL . '/bidsheet.php?id=' . $item->getId());
} else {
    echo('Invalid Item Number. Make sure you entered the right number.<a href="../item_search.php">Go Back to Item Search</a>');
}
