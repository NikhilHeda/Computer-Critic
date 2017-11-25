<?php
	$username = $_GET["username"];
	$pwd = $_GET["pwd"];

	$file = file_get_contents("users.json");
	$content = json_decode($file, true);

	foreach( $content as $user){
		if($user["username"]==$username){
			if($user["pwd"] == $pwd){
				echo "CorrectPWD;".$user["userID"].";".$user["name"];
				break;
			}
			else{
				echo "IncorrectPWD";
				break;
			}
		}
	}
	//echo "IncorrectDetails";

?>