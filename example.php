<?php


require "vendor/autoload.php";

// Load the data
$data = new \Phpml\Dataset\CsvDataset(filepath:"./data/wine.csv", features:13, headingRow:true);
// preprocessing data
$dataset = new \Phpml\CrossValidation\StratifiedRandomSplit($data, testSize:0.2, seed:156);
//dataset->getTrainSamples();
//$dataset->getTrainLabels();
//$dataset->getTestSamples();
//$dataset->getTrainLabels();

//training
$regression = new \Phpml\Regression\LeastSquares();
$regression->train($dataset->getTrainSamples(), $dataset->getTrainLabels());

$predicted = $regression->predict($dataset->getTestSamples());

//evaluating machine learning model

$score = \Phpml\Metric\Regression::r2score($dataset->getTestLabels(), $predicted);
echo 'r2score is: '. $score . PHP_EOL;

//making predictions with trained model
foreach($predicted as &$target){
    $target = round($target, precision:0);
}
$accuracy = Phpml\Metric\Accuracy::score($dataset->getTestLabels(), $predicted);
echo 'accuracy is: ' .$accuracy;
//making predictions with trained model

