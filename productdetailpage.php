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

	$iProductID = 1;
	if(isset($_GET["productid"])){
		$iProductID = $_GET["productid"];
	}

	$oProductType = new ProductType();
	$oProductType->load($iTypeID);

	$oProductDetail = new Product();
	$oProductDetail->load($iProductID);

	require_once("includes/header.php"); 

 ?>

 	<div id="promoBox">
		
		<p><span>FREE DELIVERY</span>
			<br>WHEN YOU SPEND $150 OR MORE</p>
	</div>
	

			<div id="productDetailContainer">
	<div id="history2">
		<p><a  href="index.php">HOME</a>  \  <a href="#">TOPS</a>  \  <a href="#">LACE STRIPE T-SHIRT</a></p>
	</div>
	

	<?php echo $oView->renderProductDetailPage($oProductDetail); ?>
	
	</div>
<?php 


require_once("includes/footer.php"); 

?>


