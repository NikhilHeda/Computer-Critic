
<?php

	$prod_id = $_GET['prod_id'];
	$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con, 'user-registration') or die("cannot select DB");  
  
    $query=mysqli_query($con, "SELECT * FROM comp_critic WHERE product_id=".$prod_id);  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
	{  
	    while($row=mysqli_fetch_assoc($query))  
	    {  
		    $summary=$row['summary'];  
		    $rating=$row['rating'];  
	    } 
	}
	$retarr = array("prod_id"=>$prod_id, "summary"=>$summary, "rating"=>$rating);
	$r = json_encode($retarr);
	echo ($r);

?>



<?php
/*
	$prod_id = $_GET['prod_id'];
	$file=file_get_contents("/opt/lampp/htdocs/shopper/sentiment_output.txt");
	#echo $file;
	$json = json_decode($file, true); 
	echo $json;
	#echo ($json['product_sentiment']['ProductID']);
	foreach($json['product_sentiment']['ProductID'] as $curr_product){
		if($curr_product == $prod_id){
			$pos_sentiment = $json['product_sentiment'];
		}
	}
	*/
?>