<!DOCTYPE html>
<html>
<head>
<?php
session_start();
include('../config/checklogin.php');
include('../config/config.php');
?>
</head>


<body>
    <?php
        require_once('../partials/_sidebar.php');
    ?>
    <div class="main-content">
        
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
        
    </div>
    
    
</body>
<?php include('../partials/_BootStrap.php'); ?>
</html>
