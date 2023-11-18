<!DOCTYPE html>
<html>
<head>
  <title>Wine Prediction Form</title>
</head>
<body>
  <h1>Wine Prediction Form</h1>
  
  <form method="POST" action="">
    <label for="input1">Alcohol:</label>
    <input type="text" id="input1" name="input1"><br><br>
    
    <label for="input2">Malic Acid:</label>
    <input type="text" id="input2" name="input2"><br><br>
    
    <label for="input3">Ash:</label>
    <input type="text" id="input3" name="input3"><br><br>
    
    <!-- Add more input fields as necessary -->
    
    <button type="submit">Submit</button>
  </form>

  <?php
  require "vendor/autoload.php";

  // Load the data
  $data = new \Phpml\Dataset\CsvDataset(filepath:"./data/wine.csv", features:13, headingRow:true);
  
  // Check if the form has been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $input1 = $_POST["input1"];
    $input2 = $_POST["input2"];
    $input3 = $_POST["input3"];
    
    // Perform prediction using your machine learning model
    $regression = new \Phpml\Regression\LeastSquares();
    $regression->train($data->getSamples(), $data->getTargets());
    $predicted = $regression->predict([[$input1, $input2, $input3]]);
    
    // Display the prediction result
    echo "<h2>Prediction:</h2>";
    echo "<p>$predicted[0]</p>";
  }
  ?>

</body>
</html>