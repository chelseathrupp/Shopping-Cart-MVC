<?php


require_once("includes/model_collection.php");
require_once("includes/model_product.php");
require_once("includes/model_producttype.php");
require_once("includes/model_customer.php");
require_once("includes/model_cart.php");
require_once("includes/form.php");

require_once("includes/view.php");

session_start();

$oView = new View();
$oCollection = new Collection();
$aProductTypes = $oCollection->getAllProductTypes();

$iTypeID = 1;
if(isset($_GET["typeid"])){
	$iTypeID = $_GET["typeid"];
}

$oProductType = new ProductType();
$oProductType->load($iTypeID);

$oForm = new Form();

	if(isset($_POST["submit"])){
		$oForm->data = $_POST;

		$oForm->checkRequired("email");
		$oForm->checkRequired("password");

		$oCustomer = $oCollection->findCustomerByEmail($_POST["email"]);

		if($oCustomer == false){
			$oForm->raiseCustomError("email","Email is not registered");
		}else{
			$sCustomerPassword = $oCustomer->Password;
			if($_POST["password"] !== $sCustomerPassword){
				$oForm->raiseCustomError("password","Password is incorrect");
			}else{

				$_SESSION["CustomerID"] = $oCustomer->CustomerID;

				// $oCart = new Cart();
				
				// $_SESSION["Cart"] = $oCart;

				header("Location:index.php");
				exit;
			}
		}
	}

	$oForm->makeTextInput("EMAIL", "email", "text");
	$oForm->makeTextInput("PASSWORD", "password", "password");
	$oForm->makeSubmit("SIGN IN", "submit");
require_once("includes/header.php");  

?>
	<div id="promoBox">
	
		<p><span>FREE DELIVERY</span>
		<br>WHEN YOU SPEND $150 OR MORE</p>
	</div>
		
		<div id="loginContainer">
		
		<div id="loginBox">
			<h2>SIGN IN</h2>
			
			
			<?php echo $oForm->html; ?>
			<!-- <label for="email">Email</label><br><input type="text" name="email"><br>
			<label for="password">Password</label><br><input type="password" name="password"><br>
			<input type="submit" name="signin" value="SIGN IN"> -->

			
		</div>

		<div id="notAMember">
			<h2>Dont Have an Account?</h2>
			
			<a href="register.php">CREATE AN ACCOUNT</a>
			
		</div>
		</div>

<?php require_once("includes/footer.php"); ?>
