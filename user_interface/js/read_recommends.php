<?php

	$asin = $_GET['prod_id'];
	$filename = "../Recommender/recommender_output.json";
	$json_reviews = json_decode(file_get_contents($filename));
	
	$result = array();
	$priority = array();
	foreach ($json_reviews as $review) {
		if ($review->asin == $asin) {
			array_push($result, $review->recommed_prodid);
			array_push($priority, $review->priority);
		}
	}
	
	// print_r($result);
	// echo "<br /><br />";
	// print_r($priority);
	// echo "<br /><br />";
	
	// array_multisort($priority, SORT_ASC, $result);
	
	// echo "Sorted Based on priority => <br />";
	echo json_encode($result);
	
?>