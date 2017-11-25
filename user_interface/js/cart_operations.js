function fillCart(){
	var qty = document.getElementById("options2").value;
	var price = document.getElementById("price").innerHTML;
	var total = Number(qty) * Number(price);
	var url = "single.php?total="+total+"?cart_qty="+qty;
	window.location.replace(url);
}

function updatePageCartDetails(qty, total){
	document.getElementById("simpleCart_quantity").innerHTML = qty;
	document.getElementById("simpleCart_total").innerHTML = total;
}