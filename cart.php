<?php 
	
	require_once("includes/view.php");
	require_once("includes/model_collection.php");
	require_once("includes/model_product.php");
	require_once("includes/model_cart.php");

	session_start();

	$oCart = $_SESSION["Cart"];
	
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
	

			<div id="shoppingBag">
				<h2>SHOPPING BAG</h2>
				<div id="continueShopping">
					<a href="productcatalogue.php?typeid=1">< &nbsp;CONTINUE SHOPPING</a>
				</div>

				 <?php echo $oView->renderShoppingCart($oCart); ?>
			<!-- <table class="outsideTable">
				<tr>
					<th></th>
					<th>DETAILS</th>
					<th>SHIPPING</th>
					<th>PRICE</th>
				</tr>
				<tr>
					<td><img src="assets/images/top1.jpg" alt=""></td>
					<td>

						<table class="insideTable">
							<tr><td><p class="productName">Engineered Stripe T-Shirt<br>
								Womens Tops</p></td></tr>
							<tr><td><p>Colour: Pattern</p></td></tr>
							<tr><td><p>Quantity:1</p></td></tr>

						</table>
					</td>
					

					<td>
						<table class="insideTable">
							<tr><td><p>1-4 business days<br>
							3HR delivery not available. <br>Item sent from our warehouse</p></td></tr>
							<tr><td><p></p></td></tr>
							<tr><td><p><a class="wishlistIcon" href="">Move To Wishlist</a></p></td></tr>

					</td>
						</table>
						
					
					<td>
						<table class="insideTable">
							<tr><td><p>$109.50</p></td></tr>
							<tr><td><p></p></td></tr>
							<tr><td><p>&nbsp;<br>&nbsp;<br><a class="removeitemIcon" href="">Remove Item</a></p></td></tr>

						</table>
					</tr>
				</td>
			</table>
		 -->
			</div>

			<div id="orderSummary">
				<?php echo $oView->renderOrderSummary($oCart); ?>
				<!-- <table>
					<tr>
						<th>Order Summary</th>
					</tr>
					<tr>
						<td>SUBTOTAL: &nbsp;&nbsp;&nbsp;&nbsp; $109.55</td>
					</tr>
					<tr>
						<td>SHIPPING: &nbsp;&nbsp;&nbsp;&nbsp;FREE</td>
					<tr>
						<td class="orderSummaryTotal">TOTAL &nbsp;&nbsp;&nbsp;NZD $109.55</td>
					</tr>
					
				</table>
			 -->
			<a class="checkoutButton" href="">CHECKOUT</a>


			</div>


<?php 


require_once("includes/footer.php"); 

?>


