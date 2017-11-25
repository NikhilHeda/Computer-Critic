<?php
	/*Retrieve product ID */
	$prod_id = $_GET["prod_id"];
	$summarised_text = "No result";

	/*Get Text Summarisation Results*/
	$file = file_get_contents("../TextSummarisation/product_summaries.json");
	$content = json_decode($file, true);
	foreach($content as $product){
		if ($product['asin'] == "$prod_id"){
			//Improper, Changer here. Code just selects last review summary
			$summarised_text = $product['ccProductSummary'];
		}
	}
	echo $summarised_text;

?>