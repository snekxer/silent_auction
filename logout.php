<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/7/2018
 * Time: 3:03 PM
 */

session_start();
include('data/functions.php');

session_unset();
session_destroy();

header('Location: ' . BASEURL . '/login.html');