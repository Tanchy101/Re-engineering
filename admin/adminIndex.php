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

  <!-- Sidenav -->
  <?php
  require_once('../partials/_adminsidebar.php');
  ?>

 
<header>
  <h1>ADMIN VIEW</h1>
</header>


<div class="mytabs">
  <input type="radio" id="tabpending" name="mytabs" checked="checked">
  <label for="tabpending" style="background-color: #99948F;"><h5>PENDING</h5></label>
  <div class="tab">
      <div class="styled-box" style="background-color: rgba(213, 211, 209, 8)">
      <div style="overflow-x: auto; text-align: left;">
          <table>
            <tr>
              <th>USER</th> 
              <th>ADDRESS</th> 
              <th>PRODUCT</th> 
              <th>PRICE</th> 
              <th>QUANTITY</th> 
              <th>AMOUNT</th>
            </tr>
            <tr>
              <td>hev jenie asdasdasd</td>
              <td>1157 marzan st. sampaloc, manila</td>
              <td>kush</td>
              <td>300php</td>
              <td>2 grams</td>
              <td>600php</td>
            </tr>  
            <tr>
              <td>hev jenie asdasdasd</td>
              <td>1157 marzan st. sampaloc, manila</td>
              <td>kush</td>
              <td>300php</td>
              <td>2 grams</td>
              <td>600php</td>
            </tr>  
          </table>
        </div>
      </div>
    </div>



    <input type="radio" id="tabtopack" name="mytabs">
    <label for="tabtopack" style="background-color: #FAB6AB;"><h5>TO PACK</h5></label>
    <div class="tab">
      <div class="styled-box" style="background-color: rgba(252, 225, 217, 8);">
        <div style="overflow-x: auto; text-align: left;">
          <table>
            <tr>
              <th>USER</th> 
              <th>ADDRESS</th> 
              <th>PRODUCT</th> 
              <th>PRICE</th> 
              <th>QUANTITY</th> 
              <th>AMOUNT</th>
            </tr>
            <tr>
              <td>hev jenie asdasdasd</td>
              <td>1157 marzan st. sampaloc, manila</td>
              <td>kush</td>
              <td>300php</td>
              <td>2 grams</td>
              <td>600php</td>
            </tr>  
            <tr>
              <td>hev jenie asdasdasd</td>
              <td>1157 marzan st. sampaloc, manila</td>
              <td>kush</td>
              <td>300php</td>
              <td>2 grams</td>
              <td>600php</td>
            </tr>  
          </table>
        </div>
      </div>
    </div>


    <input type="radio" id="tabintransit" name="mytabs">
    <label for="tabintransit" style="background-color: #5DCAD1;"><h5>IN TRANSIT</h5></label>
    <div class="tab">
      <div class="styled-box" style="background-color: rgba(189, 233, 232, 8);">
      <div style="overflow-x: auto; text-align: left;">
          <table>
            <tr>
              <th>USER</th> 
              <th>ADDRESS</th> 
              <th>PRODUCT</th> 
              <th>PRICE</th> 
              <th>QUANTITY</th> 
              <th>AMOUNT</th>
            </tr>
            <tr>
              <td>hev jenie asdasdasd</td>
              <td>1157 marzan st. sampaloc, manila</td>
              <td>kush</td>
              <td>300php</td>
              <td>2 grams</td>
              <td>600php</td>
            </tr>  
            <tr>
              <td>hev jenie asdasdasd</td>
              <td>1157 marzan st. sampaloc, manila</td>
              <td>kush</td>
              <td>300php</td>
              <td>2 grams</td>
              <td>600php</td>
            </tr>  
          </table>
        </div>
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
  padding: auto;
  width: 65.60em;
  height: 2.5em;
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

th {
  font-size: 14px;
  font-weight: lighter;
  top: 2em;
  padding-bottom: 18px;
  padding-top: 10px;
  
  
}

th,td{
  padding-left: 20px;
  column-gap: 40px;
}

td{
  line-height: 1.0;
  
}

h5{
  font-size: 15px;
  margin-top: -0.3em;
}

p {
  margin-top: 6.20px;
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
    display: flex;
    flex-wrap: wrap;
    max-width: 1100px;
    padding: 25px;
    align-items: left; margin-left: 335px;
    border-radius: 10px;
    flex-content: row;
    height: 1em;
    position: fixed;
    
    
}
.mytabs input[type="radio"] {
    display: none;
}

.mytabs label {
    padding: 23px;
    background: #e2e2e2;
    font-weight: bold;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px;
    height: 13px;
    width: 13em;
    cursor: pointer;
    text-align: center;
    margin-top: 1em;
    flex-content: center;
    
    
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