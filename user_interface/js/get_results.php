<?php
	/*Retrieve product ID */
	$prod_id = $_GET["prod_id"];
	$summarised_text = "No result";

	/*Get Text Summarisation Results*/
	$file = file_get_contents("TextSummarisation/review_summaries.json");
	$content = json_decode($file);
	foreach ($content as $product){
		if ($product['asin'] == $prod_id){
			$summarised_text = $prod_id['summary'];
		}
	}
	echo $summarised_text

?>