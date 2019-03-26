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

$reset = $_POST['reset'];


if($reset) {
    $logic->clearBids();
    header('Location: ' . BASEURL . '/admin.php');
}

//

