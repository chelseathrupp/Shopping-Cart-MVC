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
<div id="promoBoxIndex">
	
	<p><span>FREE DELIVERY</span>
		<br>WHEN YOU SPEND $150 OR MORE</p>
</div>

	<div id="newCollection">
		
		<h2>NEW COLLECTION
		</h2>
		<img src="assets/images/slideshowsample.jpg" alt="">
	</div>

<?php require_once("includes/footer.php"); ?>
