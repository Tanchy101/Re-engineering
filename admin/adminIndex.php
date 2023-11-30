<?php
 include('../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Admin View</title>
</head>
 
</head>
<body>

<header>
  <h1>ADMIN VIEW</h1>
</header>

<div class="mytabs">
  <input type="radio" id="tabpending" name="mytabs" checked="checked">
  <label for="tabpending" style="background-color: #99948F;">PENDING</label>
  <div class="tab">
      <div class="styled-box" style="background-color: #99948F;">
        <h2 style="margin-top: -0.2.5em; margin-left: 0.4em;">USER&nbsp;&nbsp;ADDRESS&nbsp;&nbsp;PRODUCT&nbsp;&nbsp;PRICE QUANTITY AMOUNT</h2>
      </div>
      <p>User1                  Address                   Product                 Price Quantity Amount</p>
    </div>

    <input type="radio" id="tabtopack" name="mytabs">
    <label for="tabtopack" style="background-color: #FAB6AB;">TO PACK</label>
    <div class="tab">
      <div class="styled-box" style="background-color: #FAB6AB;"></div>
      <h2 style="margin-top: -1.9em; margin-left: -0.1em;">USER&nbsp;&nbsp;ADDRESS&nbsp;&nbsp;PRODUCT&nbsp;&nbsp;PRICE QUANTITY AMOUNT</h2>
      <p>User1                  Address                   Product                 Price Quantity Amount</p>
    </div>

    <input type="radio" id="tabintransit" name="mytabs">
    <label for="tabintransit" style="background-color: #5DCAD1;">IN TRANSIT</label>
    <div class="tab">
      <div class="styled-box" style="background-color: #5DCAD1;"></div>
      <h2 style="margin-top: -1.9em; margin-left: -0.1em;">USER&nbsp;&nbsp;ADDRESS&nbsp;&nbsp;PRODUCT&nbsp;&nbsp;PRICE QUANTITY AMOUNT</h2>
      <p>User1                  Address                   Product                 Price Quantity Amount</p>
    </div>

  </div>
</body>
</html>

<style>

  body {
    background: #ccc;
    font-family: Montserrat;
    margin: 0;
    padding: 10px;
    background-color: #36517C;
}

  header {
    background-color: #36517C;
    color: #fff;
    padding: 0px;
    margin-top: 30px;
    margin-bottom: 50px;
    text-align: left;
    align-items: left; margin-left: 320px;
      
}

 .styled-box { 
  background-color: #99948F; 
  padding: 12px;
  width: 66.65em;
  height: 1em;
  margin: 0px; 
  border-radius: 5px; 
  align-items: left; margin-left: -1.25em;
  margin-top:   -1.25em;
  margin-right: 0.1em;
  border-radius: 0px;
   
}

.top-text {
      margin-top: 20px; /* Adjust the margin-top value as needed */
    }

h2 {
  font-size: 16px;
  margin-top: -0.15em;
  margin-left: 0.15px;

  
}

p {
  margin-top: 2.02px;
  padding: 12px;
  margin-left: -0.85em;
}

h4 { 
  margin-top: -0.1em;
  background-color: #99948F; 
  padding: 12px; 
  width: 66.65em;
  height: 1em;
  margin: 0px; 
  border-radius: 5px; 
  align-items: left; margin-left: -1.25em;
  margin-top:   -1.25em;
  margin-right: 0.1em;
  border-radius: 0px;
} 

.mytabs {
    position: fixed;
    display: flex;
    flex-wrap: wrap;
    max-width: 1050px;
    padding: 25px;
    align-items: left; margin-left: 360px;
    border-radius: 10px;
    flex-content: row;
    height: 1em;
    
    
}
.mytabs input[type="radio"] {
    display: none;
}

.mytabs label {
    padding: 20px;
    background: #e2e2e2;
    font-weight: bold;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px;
    height: 10px;
    width: 10em;
    cursor: pointer;
    text-align: center;
    
}

.mytabs .tab {
    width: 100%;
    padding: 20px;
    background: #fff;
    order: 1;
    display: none;
    height: 410px;
}


.mytabs input[type='radio']:checked + label + .tab {
    display: block;
    background: #FFFFFF;
    
}

.mytabs input[type="radio"]:checked + label {
    background: #99948F;
}



</style>