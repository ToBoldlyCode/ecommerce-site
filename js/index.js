$("#add_cart").click(function(e) {
	e.preventDefault();
	pro_id = $('#add_cart').val();
	
	$.ajax({
		type:"GET",
		url: "details.php?add_cart=" + pro_id,
		success:function(msg){
			console.log('ok')
		}
	});
	
});