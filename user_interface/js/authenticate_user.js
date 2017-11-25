function checkCredentials(){
	var username = document.getElementById("username").value;
	var pwd = document.getElementById("pwd").value;
	var xhr = new XMLHttpRequest();

	if(username == "" || pwd == ""){
		alert("Please Fill in Details.");
	}
	
	xhr.open("GET", "check_credentials.php?username="+username+"&pwd="+pwd, true); 

	xhr.onreadystatechange = function() {
		alert(this.readyState+" : "+this.status)
	    if (this.readyState == 4 && this.status == 200) {
	       // Typical action to be performed when the document is ready:      
	       var response = xhr.responseText;
	       alert(response)
	       var response_parts = response.split(";")
	       alert(response_parts[0])
	       switch(response_parts[0]){
	       		case "CorrectPWD":
	       					//alert(response)
	       					var url = "index.php?log_in=1"+"&userID="+response_parts[1]+"&name="+response_parts[2]
	       					alert(url)
	       					window.location.replace(url);
	       					break;
	       		case "IncorrectPWD":
	       					break;
	       		case "IncorrectDetails":
	       					break;
	       }
	    }
	};
	xhr.send();
	return false;
}