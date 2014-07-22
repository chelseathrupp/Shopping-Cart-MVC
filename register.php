<?php

require_once("includes/view.php");
require_once("includes/model_collection.php");
require_once("includes/model_product.php");
require_once("includes/form.php");
require_once("includes/model_customer.php");


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
	$oForm->checkRequired("first_name");
	$oForm->checkRequired("last_name");
	$oForm->checkRequired("email");
	$oForm->checkRequired("password");
	$oForm->checkMatching("password","confirm_password");
	$oForm->checkRequired("postal_address");
	$oForm->checkRequired("billing_address");

	$oCustomer = $oCollection->findCustomerByEmail($_POST["email"]);
	if($oCustomer == true){
		$oForm->raiseCustomError("email","email is already in use");
	}

	if($oForm->isValid){

		$oCustomer = new Customer();

		$oCustomer->FirstName = $_POST["first_name"];
		$oCustomer->LastName = $_POST["last_name"];
		$oCustomer->Email = $_POST["email"];
		$oCustomer->Password = $_POST["password"];
		$oCustomer->PostalAddress = $_POST["postal_address"];
		$oCustomer->BillingAddress = $_POST["billing_address"];

		$oCustomer->save();

		header("Location:success.php");
		exit;
	}
}

	$oForm->makeTextInput("FIRST NAME", "first_name", "text");
	$oForm->makeTextInput("LAST NAME", "last_name", "text");
	$oForm->makeTextInput("EMAIL", "email", "text");
	$oForm->makeTextInput("PASSWORD", "password", "password");
	$oForm->makeTextInput("CONFIRM PASSWORD", "confirm_password", "password");
	$oForm->makeTextInput("POSTAL ADDRESS", "postal_address", "text");
	$oForm->makeTextInput("BILLING ADDRESS", "billing_address", "text");
	$oForm->makeSubmit("CREATE ACCOUNT", "submit");


require_once("includes/header.php");  

?>
	<div id="promoBox">
	
		<p><span>FREE DELIVERY</span>
		<br>WHEN YOU SPEND $150 OR MORE</p>
	</div>
		
		<div id="registerContainer">
		
		<div id="registerBox">
			
			<h2>REGISTER</h2>
		
			
			<?php echo $oForm->html; ?>
			<!-- <label for="firstname">FIRST NAME</label><br><input type="text" id="firstname" name="firstname"><br>
			<label for="lastname">LAST NAME</label><br><input type="text" id="lastname" name="lastname"><br>
			<label for="email">EMAIL</label><br><input type="text" id="email" name="email"><br>
			<label for="password">PASSWORD</label><br><input type="password" id="password" name="password"><br>
			<label for="confirmpassword">CONFIRM PASSWORD</label><br><input type="password" id="confirmpassword" name="confirmpassword"><br>
			<label for="postaladdress">POSTAL ADDRESS</label><br><textarea id="postaladdress" name="postaladdress"></textarea><br>
			<input type="submit" name="signin" value="CREATE ACCOUNT"> -->

			

		</div>

		
		</div>

<?php require_once("includes/footer.php"); ?>
