<?php
	$product_id = $_GET['prod_id'];
    $string = file_get_contents("../SentimentAnalysis/sentiment_output1.txt");
    $catalog = json_decode($string, true);
    foreach ($catalog as $product) {
        if($product['ProductID']==$product_id){
            $rating = $product["round_rating"];  
        }
    }
    echo "Computer-Critc Rating : ".$rating;

?>