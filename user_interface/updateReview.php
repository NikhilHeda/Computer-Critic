<?php
	$review_content = $_GET["review_content"];
	$product_id = $_GET["prod_id"];
	$user_id = 9001;
	$name = "Paaras";
	$AdditionalArray = array(
                'user-id' => $user_id,
                'name' => $name,
                'review' => $review_content
                );

	echo $product_id;
	$file = 'reviews/'.$product_id.'/json';
	$inp = file_get_contents($file);
	$tempArray = json_decode($inp);
	$tempArray[]=$AdditionalArray;
	$jsonData = json_encode($tempArray);
	file_put_contents($file, $jsonData) or die("Unable to write file!");

	

	
?>