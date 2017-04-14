$("#add_cart").click(function(e) {
	e.preventDefault();
	pro_id = $('#add_cart').val();
	qty = 1;
	if ($('#qty') !=-1){
		qty = $('#qty').val();
	} ;
	
	console.log(qty);
	
	$.ajax({
		type:"GET",
		url: "details.php?add_cart=" + pro_id + "&qty=" + qty,
		success:function(msg){
			console.log('ok')
		}
	});
	
});