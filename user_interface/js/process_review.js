function postReview(){
	var xhr1 = new XMLHttpRequest();
	alert("Nothing")
	var asin = document.getElementById("hidden-iframe").innerHTML;
	var reviewText = document.getElementById("msg").value;
	var reviewerName = "Nikhil Heda"; //document.getElementById("hidden-iframe1").innerHTML;
	var reviewerID = "01120131209340";//document.getElementById("hidden-iframe2").innerHTML;
	var overall = document.querySelector('input[name="rating"]:checked').value;
	alert(asin+":"+reviewText+":"+reviewerName+":"+reviewerID+":"+overall);
	
	xhr1.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       // Typical action to be performed when the document is ready:
	       var response = xhr1.responseText;
	       console.log(response)
	       alert("The response: "+response);
	       
		};
	}
	xhr1.open("GET", "js/stage_reviews_to_file.php?reviewText="+reviewText+"&reviewerName="+reviewerName+"&reviewerID="+reviewerID+"&asin="+asin+"&overall="+overall, true); 
	xhr1.send();
	
}