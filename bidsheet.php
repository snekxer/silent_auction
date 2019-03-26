<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Bidsheet</title>
</head>

<?php

include('data/functions.php');

$id = $_GET[id];
$logic = new functions();

$item = $logic->searchItem($id);

$status = $logic->getBiddingStatus();
if($status['bidding']==1){
if ($item != false){
?>

<body>
<h3>Logged in as:</h3>
<h4><?php echo(unserialize($_SESSION['user'])->getName() . ', Paddle Num:' . unserialize($_SESSION['user'])->getPaddleNum()); ?></h4>
<p><?php echo('<a href="logout.php">Logout</a>'); ?></p>

<h2 class="bid-id">Item ID: <?php echo($item->getId()); ?></h2>
<h1 class="bid-name">Name: <?php echo($item->getName()); ?></h1>
<br>
<p>Description: <?php echo($item->getDescription()); ?></p>
<br>
<p>Estimated Value: $ <span class="bid-min"><?php echo($item->getEstValue()); ?></span></p>

<p>Quantity: <?php echo($item->getAmount()); ?></p>
<p>Min Bid per Item: $ <span class="bid-min"><?php echo($item->getMinBid()); ?></span></p>

<table>
    <!-- <caption>Please Print Neatly!</caption> -->
    <thead>
    <tr>
        <th scope="col">Paddle Number</th>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Bid Price Each</th>
    </tr>
    </thead>

    <tbody>
    <?php

    $bids = $logic->getBidsFromItem($item);

    foreach ($bids as $bid) {
        $user = $logic->searchUser($bid->getPaddleNum());
        ?>
        <tr>
            <td class="paddle-number"><?php echo($user->getName()); ?></td>
            <td class="name"><?php echo($user->getPaddleNum()); ?></td>
            <td class="quantity"><?php echo($bid->getQuantity()); ?></td>
            <td class="price"><?php echo($bid->getBidAmount()); ?></td>
        </tr>
        <?php
        unset($user);
    }
    ?>
    </tbody>
</table>

<h2>Submit a new Bid here:</h2>

<div class="form-block">
    <form action="/php_auction/form/bid_form.php" method="POST">

        <div class="row">
            <label for="quantity-input">Select quantity here:</label>
            <select name="quantity">
                <?php

                $item->getAmount();
                for ($i = 1; $i <= $item->getAmount(); $i++) {

                    ?>
                    <option value="<?php echo($i); ?>"> <?php echo($i); ?> </option>
                    <?php

                }

                ?>
            </select>
        </div>

        <div class="row">
            <label for="bid-price-input">Enter your bid price here: <br>(digits only)</label>
            <input name="bid_amount" type="number" id="bid-price-input">
            <input name="item_id" type="hidden" id="bid-price-input" value="<?php echo($item->getId()); ?>">
        </div>

        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>

<?php
} else {
    echo('Invalid Item Number. Make sure you entered the right number.<a href="item_search.php">Go Back to Item Search</a>');
}
} else {
    echo('Bidding has stopped!');
}
?>

</body>
</html>
