<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
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

        <h2>Registration</h2>

        <form action="/auction/registration_form_submit.py" target="_self" method="GET">
          <h3>Name:
          <input type="text" placeholder= "Username" name="user_name" required>
          </h3>
          <h3>Paddle Number
            <input type="text" placeholder= "Paddle #" name="paddle_num" required>
          </h3> 
          <p><input type="submit" value="Submit"></p>
        </form> 
  </body>
</html>

<!-- 
    1. updates jim's data
    2. registers in our system    
    3. then they can bid
-->