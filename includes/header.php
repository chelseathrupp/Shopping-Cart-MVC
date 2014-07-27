<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/normalize.css">
	<link rel="stylesheet" href="assets/style.css">
	<title>Society</title>
</head>
<body>

	<div id="masterContainer">

	<div id="container">
	<div id="header">
	
	
			<div id="leftNav">

				<?php  echo $oView->renderNavigation($aProductTypes); ?>
				<!-- <ul>
						<li><a href="productcatalogue.php">TOPS</a></li>
						<li><a href="#">BOTTOMS</a></li>
						<li><a href="#">SHOES</a></li>
						<li><a href="#">ACCESSORIES</a></li>
						<li><a href="#">OUTERWEAR</a></li>
				</ul> -->
			
			</div>
			
			<div id="titleBox">
				<h1><a href="index.php">SOCIETY</a></h1>
			</div>
			
			<div id="rightNav">
					<ul>
						<li><a href="#">SALE</a></li>
						<li><a href="#">LOOKBOOK</a></li>
					</ul>
			<!-- sale lookbook wishlist bag(0) NZ $0.00 login -->
	
			</div> 
	
			<div id="customerBox">

				<?php  
				if(isset($_SESSION["CustomerID"])){
					$oLoginCustomer = new Customer();
					$oLoginCustomer->load($_SESSION["CustomerID"]);
				
					echo '<div id="Welcome"><p> Welcome &nbsp;</p><a class="login" href="login.php">'.$oLoginCustomer->FirstName.'</a></div>
						<div id="Logout"><a href="logout.php">Logout</a></div>
						<div id="Wishlist"><a href="#">0</a><p></p></div>
						<div id="Bag"><a href="#">0</a><p></p></div>
						';
						


				}else{
					echo '<div id="Login"><a href="login.php">Login</a></div>
						<div id="Wishlist"><a href="#">0</a><p></p></div>
						<div id="Bag"><a href="#">0</a><p></p></div>';
					
				}
				
				?>
						
					
			</div>
	
	
	
	</div><!-- end of header -->

