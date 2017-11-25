function submitReview(){
	var xhr = new XMLHttpRequest();
	var product_id = document.getElementById("hidden-iframe").innerHTML;
	var review_content = document.getElementById("review-text").value;
	var reviewer_name = document.getElementById("hidden-iframe1").innerHTML;

	xhr.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       // Typical action to be performed when the document is ready:
	       document.getElementById("submission-result").innerHTML = "Thank You!";
	    }
	};
	xhr.open("GET", "updateReview.php?review_content="+review_content+"&prod_id="+product_id, true);
	xhr.send();
}