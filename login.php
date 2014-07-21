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
		
		<div id="loginContainer">
		
		<div id="loginBox">
			<h2>SIGN IN</h2>
			<form action="">
				
			<label for="email">Email</label><br><input type="text" name="email"><br>
			<label for="password">Password</label><br><input type="password" name="password"><br>
			<input type="submit" name="signin" value="SIGN IN">

			</form>
		</div>

		<div id="notAMember">
			<h2>Dont Have an Account?</>
			<form action="">
			
			<input type="submit" name="submit" value="CREATE AN ACCOUNT">
			</form>
		</div>
		</div>

<?php require_once("includes/footer.php"); ?>
