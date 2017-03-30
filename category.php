<!DOCTYPE>
<?php
include("functions/functions.php")
?>
<html>
	<head>
		<title>Responsive Modular Ecommerce Sample</title>
		<link rel= "stylesheet" href="styles/bootstrap.css" media="all" />
		<link rel= "stylesheet" href="styles/index.css" media="all" />
	</head>
	<body>
		<div id="main_wrapper">
			<div id="header_bar">
				<div id="main_menu" tabindex="0">
				<ul class="flyout">
					<li><span class="menu_heading"><br>Browse</br></span></li>
					<span class="menu_links">
					<li><p><a href="category.php?category=0&">All</a></p></li>
					<?php getCategory(); ?>
					</span>
					<li><span class="menu_heading"><br>About</a></br></span></li>
					<span class="menu_links">
					<li><p><a href="about.php">About Us</a></p></li>
					<li><p><a href="contact.php">Contact Us</a></p></li>
					</span>
				</ul>
				</div>
				<div id="header_link">
					<div id="home_link">
						<a href="./index.php">
							Home
						</a>
					</div>
					<div id="cart_menu">
						<a href="cart.php">
							Shopping Cart
						</a>
					</div>
					<div id="login">
						<a href="login.php">
							Sign In
						</a>
					</div>
				</div>
			</div>
			<div id="content_wrapper">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div id="cat_menu">
							<div class="row">
								<div class="col-xs-6">
							<ul>
							<?php
								$base_url = $_SERVER['REQUEST_URI'];
								$base_url = substr($base_url, 0, strpos($base_url, "&"));
								echo "
									<li><a href='$base_url&filter=new'>New</a></li>
									<li><a href='$base_url&filter=popular'>Popular</a></li>
									</ul>
								";
							?>
								</div>
								<div class="col-xs-6">
								<div id="search">
									<form method="get" action="results.php" enctype="multipart/form-data">
									<input type="text" name="user_query" placeholder="Search"/>
									<input type="submit" style="position:absolute; left: -9999px; width:1px; height:1px;" tabindex="-1" />
									</form>
								</div>
								</div>
							</div>
						</div>
					</div>
				<div class="content_body">
						<div class="row">
					<?php
						if(isset($_GET['filter'])){
							$filter = $_GET['filter'];
							$cat_id = $_GET['category'];
							if ($filter == 'new') {
								getNew($cat_id);
							} else if ($filter == 'popular') {
								getPopular($cat_id);
							}
						} else if(isset($_GET['category'])){
							$cat_id = $_GET['category'];
							getCategoryProduct($cat_id);
						}
					?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>	
</html>