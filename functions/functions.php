<?php

$con = mysqli_connect("localhost", "root", "","ecommerce");

function getCategory(){
	global $con;
	$get_category = "select * from categories";
	$run_category = mysqli_query($con, $get_category);
	
	while ($row_category = mysqli_fetch_array($run_category)) {
		$cat_id = $row_category['cat_id'];
		$cat_title = $row_category['cat_title'];
		
		echo "<li><p><a href='category.php?category=$cat_id&'>$cat_title</a></p></li>";
	}
}

function getRand(){
	global $con;
	$get_product = "select * from products order by RAND() LIMIT 0,8";
	$run_product = mysqli_query($con, $get_product);
	
	while($row_product=mysqli_fetch_array($run_product)) {
		$pro_id = $row_product['product_id'];
		$pro_cat = $row_product['product_cat'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_image = $row_product['product_image'];
		
		echo "
				<div class='col-xs-4 col-md-3'>
					<div class='product_card'>
					<a href='details.php?pro_id=$pro_id'><img src='admin/product_images/$pro_image' height='200px' width='200px'/></a>
					<p><b>$pro_title</br></p>
					<p style='float:right; color:green; padding-right:2px;'><b>$$pro_price</b></p>
					</br>
					</div>
				</div>
			";
	}
}

function getNew($cat_id){
	global $con;
	
	if ($cat_id == '0'){
		$get_product = "select * from products order by product_id desc limit 8";
	} else {
		$get_product = "select * from products where product_cat= '$cat_id' order by product_id desc limit 8";	
	}
	
	$run_product = mysqli_query($con, $get_product);
	
	while($row_product=mysqli_fetch_array($run_product)) {
		$pro_id = $row_product['product_id'];
		$pro_cat = $row_product['product_cat'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_image = $row_product['product_image'];
		
		echo "
				<div class='col-xs-4 col-md-3'>
					<div class='product_card'>
					<a href='details.php?pro_id=$pro_id'><img src='admin/product_images/$pro_image' height='200px' width='200px'/></a>
					<p><b>$pro_title</br></p>
					<p style='float:right; color:green; padding-right:2px;'><b>$$pro_price</b></p>
					</br>
					</div>
				</div>
			";
	}
}

function getPopular($cat_id){
	global $con;
	
	if ($cat_id == '0'){
		$get_product = "select * from products where popular='1' limit 8";
	} else {
		$get_product = "select * from products where product_cat= '$cat_id' and popular='1' order by RAND() limit 8";	
	}
	
	$run_product = mysqli_query($con, $get_product);
	
	while($row_product=mysqli_fetch_array($run_product)) {
		$pro_id = $row_product['product_id'];
		$pro_cat = $row_product['product_cat'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_image = $row_product['product_image'];
		
		echo "
				<div class='col-xs-4 col-md-3'>
					<div class='product_card'>
					<a href='details.php?pro_id=$pro_id'><img src='admin/product_images/$pro_image' height='200px' width='200px'/></a>
					<p><b>$pro_title</br></p>
					<p style='float:right; color:green; padding-right:2px;'><b>$$pro_price</b></p>
					</br>
					</div>
				</div>
			";
	}
}

function getCategoryProduct($cat_id){
	global $con;
	
	if($cat_id == 0){
		$get_product = "select * from products order by product_id";
	} else {
	$get_product = "select * from products where product_cat='$cat_id' order by product_id";
	}
	
	$run_product = mysqli_query($con, $get_product);
	
	while($row_product=mysqli_fetch_array($run_product)) {
		$pro_id = $row_product['product_id'];
		$pro_cat = $row_product['product_cat'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_image = $row_product['product_image'];
		
		echo "
				<div class='col-xs-4 col-md-3'>
					<div class='product_card'>
					<a href='details.php?pro_id=$pro_id'><img src='admin/product_images/$pro_image' height='200px' width='200px'/></a>
					<p><b>$pro_title</br></p>
					<p style='float:right; color:green; padding-right:2px;'><b>$$pro_price</b></p>
					</br>
					</div>
				</div>
			";
	}
}

function getDetails($pro_id){
	global $con;
	$get_product = "select * from products where product_id='$pro_id'";
	$run_product = mysqli_query($con, $get_product);
	
	while($row_product=mysqli_fetch_array($run_product)) {
		$pro_id = $row_product['product_id'];
		$pro_cat = $row_product['product_cat'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_desc = $row_product['product_desc'];
		$pro_image = $row_product['product_image'];
		
		echo "
				<div class='col-xs-6'>
					<p>$pro_title</p>
					<a href='details.php?pro_id=$pro_id'><img src='admin/product_images/$pro_image' height='200px' width='200px'/></a>
					<p><b>$$pro_price</b></p>
					<br>
				</div>
				<div class='col-xs-6'>
					<p>$pro_desc</p>
				</div>
			";
	}
}



?>