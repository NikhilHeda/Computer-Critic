function submitReview(){
	var reviewText = document.getElementById("review-text").value;
	var reviewerName = document.getElementById("hidden-iframe1").innerHTML;
	var reviewerID = document.getElementById("hidden-iframe2").innerHTML;
	var asin = document.getElementById("hidden-iframe").innerHTML;;
	var overall = document.getElementById("review-overall").value;

	var xhr = new XMLHttpRequest();
	var params = "reviewText="+reviewText+"&reviewerName="+reviewerName+"&reviewerID="+reviewerID+"&asin="+asin+"&overall="+overall;
	alert(params)

	xhr.open("GET", "js/stage_reviews_to_file.php", true); 
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xhr.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       // Typical action to be performed when the document is ready:
	       var response = xhr.responseText;
	      // alert("The Response: "+response);
	    }
	};
	
	xhr.send();
}

