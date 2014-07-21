<?php

require_once("includes/view.php");
require_once("includes/model_collection.php");
require_once("includes/model_product.php");


$oView = new View();
$oCollection = new Collection();
$aProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["typeid"])){
	$iTypeID = $_GET["typeid"];
}

$oProductType = new ProductType();
$oProductType->load($iTypeID);

require_once("includes/header.php");  

?>
	<div id="promoBox">
	
		<p><span>FREE DELIVERY</span>
		<br>WHEN YOU SPEND $150 OR MORE</p>
	</div>
		
		<div id="registerContainer">
		
		<div id="registerBox">
			
			<h2>REGISTER</h2>
			<form action="">
			
			<label for="firstname">FIRST NAME</label><br><input type="text" id="firstname" name="firstname"><br>
			<label for="lastname">LAST NAME</label><br><input type="text" id="lastname" name="lastname"><br>
			<label for="email">EMAIL</label><br><input type="text" id="email" name="email"><br>
			<label for="password">PASSWORD</label><br><input type="password" id="password" name="password"><br>
			<label for="confirmpassword">CONFIRM PASSWORD</label><br><input type="password" id="confirmpassword" name="confirmpassword"><br>
			<label for="postaladdress">POSTAL ADDRESS</label><br><textarea id="postaladdress" name="postaladdress"></textarea><br>
			<input type="submit" name="signin" value="CREATE ACCOUNT">

			</form>
		</div>

		
		</div>

<?php require_once("includes/footer.php"); ?>
