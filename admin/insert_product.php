<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
	<head>
		<title>Inserting Product</title>
	</head>
	<body>
		<form action="insert_product.php" method="post" enctype="multipart/form-data">
			<table align="center" width="500" border="2">
				<tr align="center">
					<td colspan="2"><h2>Insert New Post Here</h2></td>
				</tr>
				
				<tr>
					<td align="right"><b>Product Title:</b></td>
					<td><input type="text" name="product_title" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Product Category:</b></td>
					<td><select name ="product_cat" required><option>Select a Category</option>
					<?php
						$get_cats = "select * from categories";
	
						$run_cats = mysqli_query($con, $get_cats);
	
						while ($row_cats = mysqli_fetch_array($run_cats)) {
						$cat_id = $row_cats['cat_id'];
						$cat_title = $row_cats['cat_title'];
		
						echo "<option value='$cat_id'>$cat_title</option>";
						}
					?>
					</select></td>
				</tr>
				
				<tr>
					<td align="right"><b>Product Image:</b></td>
					<td><input type="file" name="product_image" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Product Price:</b></td>
					<td><input type="text" name="product_price" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Product Description:</b></td>
					<td><textarea name="product_desc" cols="25" rows="10"></textarea></td>
				</tr>
				
				<tr>
					<td align="right"><b>Product Keywords:</b></td>
					<td><input type="text" name="product_keywords" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>Check to add to popular</b></td>
					<td><input type="checkbox" name="popular" /></td>
				</tr>				
				<tr align="center">
					<td colspan="2"><input type="submit" name="insert_post" value="Insert now"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
	if(isset($_POST['insert_post'])) {
		
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		$product_popular = $_POST['popular'];
		if ($product_popular == "on"){
			$product_popular = "1";
		}
		
		$product_image = $_FILES['product_image']['name'];
		$product_image = microtime()."_".$product_image;
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp, "product_images/$product_image");
		
		$insert_product = "insert into products (product_cat,product_title,product_price,product_desc, product_image,product_keywords,popular) values ('$product_cat','$product_title','$product_price','$product_desc','$product_image', '$product_keywords', '$product_popular')";
		
		echo $product_popular;
		
		$insert_pro = mysqli_query($con, $insert_product);
		
		if($insert_pro){
			echo "<script>alert('Product has been inserted!')</script>";
			echo "<script>window.open('insert_product.php','_self')</script>";
		}
	}
?>