<?php session_start();
include('data/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Item Search</title>
    <style>
  body {
    background-color: lightblue;
  }
  
  p,h1,h2,h3,h4 {
    text-align: center;
  }
    </style>  
  </head>
  <body>
        <h3>Logged in as:</h3>
        <h4><?php echo(unserialize($_SESSION['user'])->getName() . ', Paddle Num:'. unserialize($_SESSION['user'])->getPaddleNum());?></h4>
        <p><?php echo('<a href="logout.php">Logout</a>');?></p>

        <h2>Item Search Form</h2>

        <form action="/php_auction/form/item_search_form.php" method="POST">
          <h1>Item ID:</h1>
          <p><input type="text" name="item_id" placeholder= "Item ID"></p>
          <p><input type="submit" value="Submit"></p>
        </form> 
  </body>
</html>