function randomizeItems(){
	var xhr1 = new XMLHttpRequest()
	xhr1.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	       // Typical action to be performed when the document is ready:
	       var response = JSON.parse(xhr1.responseText);
	       console.log(response)
	       for(i=1; i<=6; i++){
	       		var grid_item="grid"+i;
	       		var grid_name=grid_item+"-prod-name"
	       		var grid_link=grid_item+"-link"
	       		document.getElementById(grid_item).setAttribute("src", "catalog/"+response[i-1]["asin"]+"/1.jpg");
	       		document.getElementById(grid_name).innerHTML = response[i-1]["name"];
	       		document.getElementById(grid_link).setAttribute("href", "single.php?prod="+response[i-1]["asin"]);
	       }
	    }
	};
	xhr1.open("GET", "js/get_random_items.php", true); 
	xhr1.send();
}