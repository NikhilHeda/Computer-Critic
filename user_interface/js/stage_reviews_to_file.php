<?php

//1. Retrieve Review paramters from GET method
$reviewText = $_GET["reviewText"];
$reviewerName = $_GET["reviewerName"];
$reviewerID = $_GET["reviewerID"];
$asin = $_GET["asin"];
$overall = $_GET["overall"];


//2. Initialize Time/Date settings
//  2.1 Configure settings for "reviewTime"
date_default_timezone_set("Asia/Kolkata");
$today = getdate();
$day = $today['mday'];
$month = $today['mon'];
$year = $today['year'];
$reviewTime = '"'.$month.' '.$day.', '.$year.'"';

//  2.2 Configure settings for "unixReviewTime"
$date = date_create();
$unixReviewTime = date_timestamp_get($date);

//Create review array or review string
//  3.1 Create Review data array
$review = array(
	"reviewerID"=>$reviewerID,
	"asin"=>$asin,
	"reviewerName"=>$reviewerName,
	"helpful"=>[0,0],
	"reviewText"=>$reviewText,
	"overall"=>$overall,
	"unixReviewTime"=>$unixReviewTime,
	"reviewTime"=>$reviewTime,
	"summary"=>""
);
/*
$review->reviewerID=$reviewerID;
$review->asin=$asin;
$review->reviewerName=$reviewerName;
$review->helpful=[0,0];
$review->reviewText=$reviewText;
$review->overall=$overall;
$review->unixReviewTime=$unixReviewTime;
$review->reviewTime=$reviewTime;
$review->ccSummary="Default";
$review->ccSentiment=0.0;
*/
    
//  3.2 Create Review String
/*
$str_review = '{"reviewerID":'.$reviewerID.',"asin":'.$asin.',"reviewerName":'.$reviewerName.',"helpful":'.[0,0].',"reviewText":'.$reviewText.',"overall":'.$overall.',"unixReviewTime":'.$unixReviewTime.',"reviewTime":'.$reviewTime.'}';
*/


//4. Obtain Review file of specific product and append new review

$file = dirname(__DIR__)."/Reviews/$asin.json";
$review_data = json_decode(file_get_contents($file), true);
array_push($review_data,$review);
file_put_contents($file, json_encode($review_data));



//5. For Pranav - Call Python Scripts
$file_ip = dirname(__DIR__)."/Reviews/$asin.json ";
$file_op = dirname(__DIR__)."/Reviews/Output/$asin.json";
$result = "";
exec("python3 -W ignore get_cc_output.py \"$file_ip\" \"$file_op\"", $result);
echo json_encode($result);

/*
$command = escapeshellcmd("./get_cc_output.py $file_ip $file_op");
$output = shell_exec($command);
echo $output;
*/

//print_r($result);

//print_r($result);	//returning back to the JavaScript
//echo "RESULT: ".$result."\n\n";
//print_r($review);


?>