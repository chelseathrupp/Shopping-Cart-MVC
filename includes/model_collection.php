<?php 

require_once("connection.php");
require_once("model_producttype.php");
require_once("model_product.php");

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
	}

// $oCollection = new Collection();
// $aTypes = $oCollection->getAllProductTypes();

// echo "<pre>";
// print_r($aTypes);
// echo "</pre>";


 ?>