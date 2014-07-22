<?php 

require_once("connection.php");
require_once("model_producttype.php");
require_once("model_product.php");
require_once("model_customer.php");

	class Collection{


		 function getAllProductTypes(){

			$aTypes = array();

			$oConnection = new Connection();

			$sSQL = "SELECT TypeID
			FROM tbProductType";

			$oResult = $oConnection->query($sSQL);

			while($aRow = $oConnection->fetch_array($oResult)){
				$oProductType = new ProductType(); //create new product
				$oProductType->load($aRow["TypeID"]); //load it
				$aTypes[] = $oProductType;

			}

			return $aTypes;
		}

		function findCustomerByEmail($sEmail){

			$oConnection = new Connection();

			$sSQL = "SELECT CustomerID FROM tbCustomer WHERE Email ='".$sEmail."'";

			$oResult = $oConnection->query($sSQL);

			$aRow = $oConnection->fetch_array($oResult); //aRow will be created in there

			if($aRow == false){
				return false; //if there is nothing in aRow, it is empty. therefore the email can be registered to new user
			}else{
				$oCustomer = new Customer();
				$oCustomer->load($aRow["CustomerID"]);
				return $oCustomer; //if there is something in this aRow, email must be taken


			}

			$oConnection->close_connection();
		}
	}

// $oCollection = new Collection();
// $aTypes = $oCollection->getAllProductTypes();

// echo "<pre>";
// print_r($aTypes);
// echo "</pre>";

	// $oCollection = new Collection();
	// $oCollection->findCustomerByEmail("ruby.mcpherson@gmail.com");

	//  echo "<pre>";
	// print_r($oCollection);
	// echo "</pre>";



 ?>