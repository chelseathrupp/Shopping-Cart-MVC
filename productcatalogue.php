<?php 

require_once("includes/view.php");
require_once("includes/model_collection.php");
require_once("includes/model_product.php");

session_start();

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

$oProductDetail = new Product();
$oProductDetail->load($iProductID);

$oProductType = new ProductType();
$oProductType->load($iTypeID);

require_once("includes/header.php"); 


?>

	
	<div id="promoBox">
		
		<p><span>FREE DELIVERY</span>
			<br>WHEN YOU SPEND $150 OR MORE</p>
	</div>

	<div id="overlay" onclick="hideQuickLook();"></div>

	<div id="quickLookBox">
		<div id="productDetailContainerQuickLook">
		<?php echo $oView->renderQuickLook($oProductDetail); ?>
		</div>
		</div>
		
	<div id="refine">
		<div id="refineTitle">
			<p>REFINE</p>
		</div>
		<!-- <p>REFINE</p> -->
		<div id="accordion">
			<div id="tops">
				<p onclick="openTabs(this)">TOPS</p>
				<div id="topsRefine">
				<li><u>COLOUR</u></li>
					<li><span>CLEAR</span></li>
					<form action="">
	
						<input type="checkbox" name="black" value="black">Black<br>
						<input type="checkbox" name="cream" value="cream">Cream<br>
						<input type="checkbox" name="mint" value="mint">Mint<br>
						<input type="checkbox" name="pattern" value="pattern">Pattern<br>

					</form>
					
					<li><u>STYLE</u></li>
					

					<form action="">
	
						<input type="checkbox" name="longsleeve" value="longsleeve">Long Sleeve<br>
						<input type="checkbox" name="shortsleeve" value="shortsleeve">Short Sleeve<br>
						<input type="checkbox" name="sleveless" value="sleveless">Sleveless<br>
					
						

					</form>

				</div>
			</div>

			<div id="bottoms">
				<p onclick="openTabs(this)">BOTTOMS</p>
				<div id="bottomsRefine">
					<li><u>COLOUR</u></li>
					<li><span>CLEAR</span></li>
					<form action="">
	
						<input type="checkbox" name="black" value="black">Black<br>
						<input type="checkbox" name="black" value="black">Cream<br>
						<input type="checkbox" name="black" value="black">Mint<br>
						<input type="checkbox" name="black" value="black">Pattern<br>

					</form>
					
					<li><u>STYLE</u></li>
					

					<form action="">
	
						<input type="checkbox" name="black" value="black">Long Sleeve<br>
						<input type="checkbox" name="black" value="black">Short Sleeve<br>
						<input type="checkbox" name="black" value="black">Sleveless<br>
						
						

					</form>
				</div>
			</div>

			<div id="shoes">
				<p onclick="openTabs(this)">SHOES</p>
				<div id="shoesRefine">
					<li><u>COLOUR</u></li>
					<li><span>CLEAR</span></li>
					<form action="">
	
						<input type="checkbox" name="black" value="black">Black<br>
						<input type="checkbox" name="grey" value="grey">Grey<br>
						<input type="checkbox" name="nude" value="nude">Nude<br>
						<input type="checkbox" name="pastel" value="pastel">Pastel<br>
						<input type="checkbox" name="tan" value="tan">Tan<br>
						<input type="checkbox" name="multicoloured" value="multicoloured">Multicoloured<br>

					</form>
					
					<li><u>STYLE</u></li>
					

					<form action="">
	
						<input type="checkbox" name="sandal" value="sandal">Sandal<br>
						<input type="checkbox" name="wedge" value="wedge">Wedge<br>
						<input type="checkbox" name="heel" value="heel">Heel<br>
						<input type="checkbox" name="coveredshoe" value="coveredshoe">Covered Shoe<br>
						<input type="checkbox" name="flat" value="flat">Flat<br>
						<input type="checkbox" name="boot" value="boot">Boot<br>
						
						

					</form>
				</div>
			</div>

			<div id="accessories">
				<p onclick="openTabs(this)">ACCESSORIES</p>
				<div id="accessoriesRefine">
					
				</div>
			</div>

			<div id="outerwear">
				<p onclick="openTabs(this)">OUTERWEAR</p>
				<div id="outerwearRefine">
					
				</div>
			</div>




		</div>
		
	</div>
	
	<div id="pageDetailBox">
		<div class="history">
			<p><a href="index.php">HOME</a>  \  <a href="#">TOPS</a></p>
		</div>
	
		<div id="orderBy">
			
			<p>SORT BY </p><select>
			<option value="Price - High to Low">Most Popular</option>
	  		<option value="Price - Low to High">Price - Low to High</option>
	  		<option value="Price - High to Low">Price - High to Low</option>
	
			</select>
		</div>
	</div>
	
	<div id="productBox">

		<?php echo $oView->renderCategory($oProductType); ?>

		
	</div>

	

<?php require_once("includes/footer.php"); ?>
