<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();


require "vendor/autoload.php";

use Phpml\Dataset\CsvDataset;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Regression\LeastSquares;
use Phpml\Metric\Regression;

$prediction = null;
$score = null;
$printResult = false;
$errors = [];

// Reset variables on page refresh
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $prediction = null;
    $score = null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Load the data
    $data = new CsvDataset("./data/dataschoolmid.csv", 2, true); // Update with your dataset path and column details

    // Preprocessing data
    $dataset = new RandomSplit($data, 0.2);

    // Training
    $regression = new LeastSquares();
    $regression->train($dataset->getTrainSamples(), $dataset->getTrainLabels());

    // Get user input
    $input1 = $_POST["input1"];
    $input2 = $_POST["input2"];
    $input = [$input1, $input2];

    // Check condition for suitable number of computers
    $validComputers = isValidComputers($input1, $input2);
    if ($validComputers) {
        // Make prediction
        $prediction = $regression->predict($input);

        // Evaluate the model
        $score = Regression::r2score($dataset->getTestLabels(), $regression->predict($dataset->getTestSamples()));

        // Set the flag to true for printing the result
        $printResult = true;
    } else {
        if ($input1 < 5 || $input1 >= 118) {
            $errors[] = "Invalid number of computers.";
        }
        if ($input2 < 10 || $input2 >= 160) {
            $errors[] = "Invalid room size.";
        }
    }
}

/**
 * Function to check if the number of computers is valid for the given room size.
 *
 * @param int $computers
 * @param int $roomSize
 * @return bool
 */
function isValidComputers($computers, $roomSize)
{
    // Implement your validation logic here
    // Return true if the number of computers is valid for the room size, otherwise return false
    // You can define your own conditions based on your requirements
    // For example, you can compare the number of computers and room size, check if they are within a certain range, etc.
    // Modify this function as per your specific validation criteria

    if ($roomSize >= 54 && $roomSize <= 110) {
        return true;
    } elseif ($roomSize == 54 && $computers >= 5 && $computers <= 31) {
        return true;
    } elseif ($roomSize > 54 && $roomSize <= 66 && $computers >= 5 && $computers <= 35) {
        return true;
    } elseif ($roomSize > 66 && $roomSize <= 71 && $computers >= 5 && $computers <= 39) {
        return true;
    } elseif ($roomSize > 71 && $roomSize <= 79 && $computers >= 5 && $computers <= 45) {
        return true;
    } elseif ($roomSize > 79 && $roomSize <= 87 && $computers >= 5 && $computers <= 51) {
        return true;
    } elseif ($roomSize > 87 && $roomSize <= 89 && $computers >= 5 && $computers <= 57) {
        return true;
    } elseif ($roomSize > 89 && $roomSize <= 95 && $computers >= 5 && $computers <= 59) {
        return true;
    } elseif ($roomSize > 95 && $roomSize <= 99 && $computers >= 5 && $computers <= 65) {
        return true;
    } elseif ($roomSize > 99 && $roomSize <= 103 && $computers >= 5 && $computers <= 66) {
        return true;
    } elseif ($roomSize > 103 && $roomSize <= 119 && $computers >= 5 && $computers <= 75) {
        return true;
    } elseif ($roomSize > 119 && $roomSize <= 129 && $computers >= 5 && $computers <= 83) {
        return true;
    } elseif ($roomSize > 129 && $roomSize <= 139 && $computers >= 5 && $computers <= 91) {
        return true;
    } elseif ($roomSize > 139 && $roomSize <= 149 && $computers >= 5 && $computers <= 98) {
        return true;
    } elseif ($roomSize > 149 && $roomSize <= 160 && $computers >= 5 && $computers <= 118) {
        return true;
    } else {
        return false;
    }
}
?>
    <title>Predictive Model Form</title>
    <?php
    require_once('partials/_head.php');
    ?>

    <!--<script>
        window.onload = function() {
            // Set the zoom level to 67% (0.67) when the page loads
            document.body.style.zoom = "75%";
        };
    </script>-->
<body>
  <!-- Sidenav -->
  <?php
  $activePage = 'page3';
  require_once('partials/_sidebar.php');
  ?>
  
     <?php
    require_once('partials/_head.php');
    ?>
<style>
    h3 {
        color: white; 
    }
    label {
        color: white; 
    }
    .icon-info {
        display: inline-block;
        cursor: pointer;
        margin-left: 10px; /* Adjust the margin as needed to create spacing between the icon and the heading */
    }

    .icon-info i {
        font-size: 24px;
        color: #007bff;
    }

    .icon-info:hover i {
        color: #0056b3;
    }

    /* CSS to handle the visibility of the information box */
    .alert-info {
        display: none;
    }

    .alert-info.show {
        display: block;
    }
</style>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div style="background-image: url(assets/img/theme/costpredictbg.png); background-size: cover; height: 100vh;" class="header pb-8 pt-5 pt-md-8">
            <span class="mask bg-gradient-dark opacity-5"></span>
            <div class="container-fluid">
                <div class="header-body"></div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow" style= "border-color: transparent; border: 0px;">
                    <div class="card-header border-0" style= "background-color: rgba(22,27,34,.8); margin-top: -32em; 
            border-top-right-radius: 25px; border-top-left-radius: 25px; height: 5em;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title" style="margin-top: 0.7em;">Please Fill All Fields</h3>
                        <div class="icon-info" id="infoBtn" style="margin-top: -0.7em;">
                            <i class="bx bxs-info-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="alert alert-info mt-0 <?php if ($_SERVER["REQUEST_METHOD"] !== "POST" || !empty($errors)) echo 'show'; ?>" 
                id="infoBox" style="display: none; margin-bottom: 0em; border-radius: 5px;">
                            <p style="margin-top: 1.2em; font-weight: bold;"><strong>Number of Computers:</strong> Minimum: 5, Maximum: 118</p>
                            <p style="font-weight: bold;"><strong>Room Size:</strong> Minimum: 54 sqm, Maximum: 160 sqm</p>
                            
                        </div>
                        <div class="card-body" style= "background-color: rgba(22,27,34,.8); border-bottom-right-radius: 25px; 
                        border-bottom-left-radius: 25px; margin-bottom: 5.5em;">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="input1" class="form-label">Enter number of Computers in the Room:</label>
                                        <input type="number" name="input1" id="input1" class="form-control" style="color: black;" min="5" max="118"required >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input2" class="form-label">Enter Room Size in Square Meters:</label>
                                        <input type="number" name="input2" id="input2" class="form-control" style="color: black;" min="54" max="160"required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="submit" value="Predict" class="btn" style="background-color: #7ED957; color: white; font-weight: bold;">
                                        <div class="col-md-6"><div class="text-center">
                        <a href = costpredict.php>
                        <input type="" value="Go Back" class="btn btn-warning value=" style = "margin:0px; width: 7.5em; margin-top: -3.05em; margin-left: 2.5em; height: 3.1em;" readonly></a>
                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Display error messages and results -->
            <?php
            // Display the error messages if they exist
            if (!empty($errors)) {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $error) {
                    echo $error . '<br>'; 
                }
                echo '</div>';
            } elseif ($_SERVER["REQUEST_METHOD"] === "POST" && !$validComputers) {
                // Display the message for invalid input of Computers or Room Size
                echo '<div class="alert alert-danger">';
                echo 'Invalid input of Computers or Room Size';
                echo '</div>';
            }
            
            // Display the results if form submitted and condition met
            if ($_SERVER["REQUEST_METHOD"] === "POST" && $printResult) {
                echo '<div class="alert alert-success">';
                echo 'Predicted Cost: ₱ ' . number_format($prediction, 2) . '<br>';
                echo 'R2 Score: ' . $score . '<br>';
                echo '</div>';
            }
            ?>
        </div>

                <script>
            document.getElementById("infoBtn").addEventListener("click", function() {
                var infoBox = document.getElementById("infoBox");
                if (infoBox.style.display === "none") {
                    infoBox.style.display = "block";
                } else {
                    infoBox.style.display = "none";
                }
            });
        </script>
        <script>
  function goToCostPredict() {
    window.location.href = "costpredict.php";
  }
</script>


    <?php require_once('partials/_scripts.php'); ?>
</body>
</html>