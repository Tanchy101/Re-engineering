<!DOCTYPE html>
<html>
<html lang="en">
<?php
session_start();
include('../config/checklogin.php');
include('../config/config.php');
?>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Tabs</title>

</head>


<body>
    <?php
        require_once('../partials/_sidebar.php');
    ?>
  <div class="mytabs">
    <input type="radio" id="tabfree" name="mytabs" checked="checked">
    <label for="tabfree">Pending Orders</label>
    <div class="tab">
   
   
    <table border-collapse: collapse; width: 100%;>
        <thead> <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th width="2em">Amount</th>
        </tr></thead>
        <tbody>
            <tr>
                <td>Product Pending</td>
                <td>$10.00</td>
                <td>2</td>
                <td>$20.00</td>
            </tr> <tr> <td></td> </tr>
       <!-- Total Amount-->     <tr class="total-row">
        <td colspan="3">Total Amount:</td>
        <td>$65.00</td>
      </tr>
</table>


        </div>

    <input type="radio" id="tabsilver" name="mytabs">
    <label for="tabsilver">To Pack</label>
    <div class="tab">
    
      <table border-collapse: collapse; width: 100%;>
        <thead> <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr></thead>
        <tbody>
            <tr>
                <td>Product Packing</td>
                <td>$10.00</td>
                <td>2</td>
                <td>$20.00</td>
            </tr> <tr> <td></td> </tr>
       <!-- Total Amount-->     <tr class="total-row">
        <td colspan="3">Total Amount:</td>
        <td>$65.00</td>
      </tr>


</table>

    
    </div>

    <input type="radio" id="tabgold" name="mytabs">
    <label for="tabgold">To Receive</label>
    <div class="tab">
   
    <table border-collapse: collapse; width: 100%;>
        <thead> <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr></thead>
        <tbody>
            <tr>
                <td>Product Receiving</td>
                <td>$10.00</td>
                <td>2</td>
                <td>$20.00</td>
            </tr>
            </tr> <tr> <td></td> </tr>
       <!-- Total Amount-->     <tr class="total-row">
        <td colspan="3">Total Amount:</td>
        <td>$65.00</td>
      </tr>


</table>
    </div>

  </div>


<style>
  body {
    background: #ccc;
    font-family: 'Roboto', sans-serif;
}
.mytabs {
    display: flex;
    flex-wrap: wrap;
    max-width: 65%;
    margin: 1em auto;
    padding: 2em;
}
.mytabs input[type="radio"] {
    display: none;
}
.mytabs label {
    padding: 2em;
    background: #e2e2e2;
    font-weight: bold;
}

.mytabs .tab {
    width: 100%;
    padding: 2em;
    background: #fff;
    order: 1;
    display: none;
}
.mytabs .tab h2 {
    font-size: 3em;
}

.mytabs input[type='radio']:checked + label + .tab {
    display: block;
}

.mytabs input[type="radio"]:checked + label {
    background: #fff;
}

td, th {
border:.1em solid #dddddd;
text-align:left;
padding: 1em;
width: 20%;
}

table {

      width: 100%;
    }

    th {
      background-color: #f2f2f2;
    }    
    th:first-child,
    td:first-child {
      width: 70%;
    }
    tr.total-row td{
        text-align: right;
    }
</style>
   <!-- <div class="main-content">
        
            <div class="container">
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">To Pack</th>
                            <th scope="col">To Ship</th>
                            <th scope="col">To Receive</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row" <?php ?> > </th>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            </tr>
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
    </div>-->
    
    
</body>
<?php include('../partials/_BootStrap.php'); ?>
</html>
