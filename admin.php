<?php
/**
 * Created by PhpStorm.
 * User: valdi
 * Date: 11/7/2018
 * Time: 5:12 PM
 */

session_start();
include('data/functions.php');
$logic = new functions();
$bidding = $logic->getBiddingStatus();
?>

<h2>Bidding Status:</h2> <p><?php if($bidding['bidding']==1){echo('Active');}else if($bidding['bidding']==0){echo('Inactive');}?></p>

<form action="form/admin_submit.php" method="POST">
    <input type="hidden" name="status" value="1">
    <button type="submit">Activate Bidding</button>
</form>

<form action="form/admin_submit.php" method="POST">
    <input type="hidden" name="status" value="0">
    <button type="submit">Deactivate Bidding</button>
</form>


<h2>Generate Winners and Stop Bidding?</h2>

<form action="form/admin_submit.php" method="POST">
    <input type="hidden" name="winner" value="true">
    <input type="hidden" name="status" value="0">
    <button type="submit">Yes</button>
</form>



