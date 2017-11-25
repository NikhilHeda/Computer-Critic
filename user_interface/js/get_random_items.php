
<?php
	$file = file_get_contents("../ProductInfo/product_catalog.json", true);
	$content = json_decode($file);
	shuffle($content);
	$json_data = json_encode($content);
	echo $json_data;
?>