function getRecommends() {
	//asin = document.getElementById("asin").innerHTML;
	asin = document.getElementById("hidden-iframe").innerHTML;
	 
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.response);
			fillRecommendDiv(JSON.parse(this.response));
		}
	}
	
	xhr.open("GET", "js/read_recommends.php?prod_id=" + asin, true);
	xhr.send(null);
}

// Implemeted as a closure!!!
function handleElement(img, asin) {
    img.onclick = function() {
		window.location.href = "single.php?prod=" + asin;
	}
}

function fillRecommendDiv(reviews) {
	for (var item in reviews) {
		console.log(reviews[item])
		
		var imageElement = document.createElement("img");
		imageElement.src = "catalog/" + reviews[item] + "/1.jpg";
		
		handleElement(imageElement, reviews[item]);
		
		var divElement = document.getElementById("recommend-container");
		divElement.appendChild(imageElement);
	}
}