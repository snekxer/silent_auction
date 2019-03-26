<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bid Page</title>
    <style>
  body {
    background-color: lightblue;
  }
  
  h2,h3,h4 {
    text-align: center;
  }
  
  table, td, th {
      border: 1px solid black;
  }
  
  table {
      border-collapse: collapse;
      width: 100%;
  }
  
  td {
    text-align: center;
  }
  
  th {
      height: 20px;
      text-align: center;
  }
    </style>  
  </head>
  <body>
    <h2>Bid Page</h2>
    <h3>Item: </h3>
    <h4 name="item_id">ID: </h4>

    <h4 class="current_bids">Current Bids</h4>
    <p>Minimun Bid: </p>
      <table>
        <tr>
          <th>Item Name</th>
          <th>Item #</th>
          <th>Item Desc.</th>
        </tr>
        <tr>
          <td>Chair</td>
          <td>1001</td>
          <td>to sit on</td>
        </tr>
      </table>

    <form action="/auciton/bid_form_submit.py" target="_blank" method="GET">
        <p>Your Bid Amount: 
            <input type="text" placeholder= "Amount (ie 10)" name="amount" >
            <input type="submit" value="Submit">
        </p>
    </form> 

  </body>
</html>