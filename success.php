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
		
		<div id="registerSuccessContainer">
		
		<div id="registerSuccessBox">
			
			<h2>Thankyou, you have successfully registered and should recieve an email shortly.</h2>
			
		</div>

		
		</div>

<?php require_once("includes/footer.php"); ?>
