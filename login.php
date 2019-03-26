<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row d-block text-center">
            <h1 class="mt-5">Welcome to Silent Auction!</h1>

            <form action="/php_auction/form/login_form.php" method="POST">
                <label for="user_pin" class="mt-5">Enter your paddle number here:</label>
                <input name="paddle_num" type="number" id="user_pin" class="form-control" style="max-width: 350px; margin: 20px auto;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
    
</body>
</html>
