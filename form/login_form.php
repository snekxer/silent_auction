<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/6/2018
 * Time: 5:04 PM
 */
session_start();

include("../data/functions.php");

$paddle_num = $_POST['paddle_num'];

$logic = new functions();

$user = $logic->searchUser($paddle_num);
//echo($user->getName().' '.$user->getPaddleNum());
if($user!=false){
    $logic->login($user);
    echo($_SESSION['user']);
    header('Location: ' . BASEURL . '/item_search.php');
} else {
    echo('Invalid Paddle Number, make sure you entered the correct number. <a href="../login.html">Go Back to Login Screen</a> ');
}
