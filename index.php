<!DOCTYPE>
<?php
include("functions/functions.php")
?>
<html>
	<head>
		<title>Responsive Modular Ecommerce Sample</title>
		<link rel= "stylesheet" href="styles/bootstrap.css" media="all" />
		<link rel= "stylesheet" href="styles/index.css" media="all" />
		<?php getSession(); ?>
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
						<a data-toggle="modal" href="#login_modal">
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
						getRand();
					?>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</body>
	 
            <div id="login_modal" class="modal fade" style="display: none; "> 
				<div class="modal-dialog">
					<div class="modal-content">			
						<div class="modal-header">  
						<a class="close" data-dismiss="modal">×</a>  
						<h3>Sign Into Your Account</h3>  
						</div> 
						<div id="login_modal_body">
							<form action="login.php" method="post" enctype="form-data">
								<label><b>Username:</b></label>
								<input type="text" placeholder="Username" name="uname" required>
								<br>
								<label><b>Password:</b></label>
								<input type="password" placeholder="*********" name="psw" required>
								<div id="login_modal_button">
								<br><button type="submit">Login</button>
								</div>
								<input type="checkbox" checked="checked"> Remember me
								</form>
						</div>
						<div id="login_modal_footer">
							<span id="pw_reset"><a href="resetpass.php">Forgot password?</a></span>
							<span id="register_link"><a href="register.php">Register an Account</a></span>
							<br>
						</div>
					</div>  
				</div>					
			</div>	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
</html>