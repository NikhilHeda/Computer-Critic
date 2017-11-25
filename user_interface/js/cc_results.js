function getCCResults(){
	var prod_id = document.getElementById("hidden-iframe").innerHTML;
	getSummarisedText(prod_id);
	getSentimentScore(prod_id);

}

function getSummarisedText(prod_id){
	var xhr1 = new XMLHttpRequest();
	
	xhr1.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       // Typical action to be performed when the document is ready:
	       var response = xhr1.responseText;
	       document.getElementById("summarised-text").innerHTML = response;
	    }
	};
	xhr1.open("GET", "js/read_summarised_text.php?prod_id="+prod_id, true); 
	xhr1.send();
}

function getSentimentScore(prod_id)
{
    // reading output of sentiment analysis
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
    	if(this.readyState==4 && this.status==200)
   		{
        document.getElementById("sentiment-score").innerHTML = xhr.responseText;
    	}
    }
    xhr.open("GET", "js/read_sentiment_output.php?prod_id="+prod_id, true);
    xhr.send();
}

      