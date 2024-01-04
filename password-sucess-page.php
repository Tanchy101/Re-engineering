<?php

include('config/config.php');




require_once('partials/_head.php');
?>

<style>
@font-face {
    font-family: 'Blanka';
    font-style: normal;
    font-weight: 400;
    src: local('Blanka'), url('https://fonts.cdnfonts.com/s/18915/Blanka-Regular.woff') format('woff');
}

.btn{
    border-radius: 25px;
    background-color: #7ED957; 
    font-family: 'Montserrat';
    font-weight: bold;
    color: white;
    width: 21em;
}

.bg-image{
    display: flex; 
    background-image: url('assets/img/brand/Index BG.png'); 
    background-size: cover; 
    height: 100vh;"
}

.error{
   margin-top: 30px;
   color: #af0c0c;
}
 
.success{
   margin-top: 30px;
   color: green;
}
</style>


<!-- wag pi <script>
>>>>>>> Stashed changes
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script> -->



<body class="bg-image">
    
    <div>
    

    

        <div class="text" style="position: absolute; margin-top: 0.7em; left: 3%; color: white; font-size: 40px; font-family: 'Montserrat'; 
        font-weight: bold;">Network Assessment Layout System</div>

            <div class="container" style="position: relative; margin-top: 16.5em; margin-left: 20em; width: 345px;">
                <div class="header-body text-center mb-7">
                    <div class="col">
                        <!-- Move the h1 tag inside the col-lg-5 col-md-7 div -->
                        <div style="margin-left: 22em;">
                            <div class="col-lg-0 col-md-0">
                                <div class="card bg-secondary shadow border-10" style="border-radius: 20px; margin-bottom: 20px; width: 451px;">
                                    <div class="card-body" style="position: relative; top: 0; left: 0; background-color: #161B22; border-radius: 20px; width: 449px;">
                                        <!-- Align the text horizontally -->
                                        <h1 class="text-black" style="display: flex; font-size: 20px; text-align: left; margin-bottom: 15px; color: white; font-family: Montserrat;">Password successfully changed. Thank you!</h1><a href="index.php">Click Here to Login</a>
                                        <!-- Form starts here -->
                                    
                                                
                                            </div>
                                            
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div><br>
                
        <!-- Footer -->
        <?php require_once('partials/_FooterIndex.php'); ?>
            </div>
        </div>
        
        <!-- Page content -->

        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                </div>
            </div>
        </div>
    </div>

    <!-- Argon Scripts -->
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>
