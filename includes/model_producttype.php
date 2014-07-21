<?php 

	require_once("connection.php");
	require_once("model_product.php");

	class ProductType{

		private $iTypeID;
		private $sTypeName;
		private $aProducts;


		public function __construct(){
			$this->iTypeID = 0;
			$this->sTypeName = "";
			$this->aProducts = array();
		}

		public function load($iID){

			$oConnection = new Connection();

			$sSQL = "SELECT TypeID, TypeName
			FROM tbProductType
			WHERE TypeID =" .$iID;

			$oResult = $oConnection->query($sSQL);

			$aProductType = $oConnection->fetch_array($oResult);

			$this->iTypeID = $aProductType["TypeID"];
			$this->sTypeName = $aProductType["TypeName"];


				// load products under each product type

				$sSQL = "SELECT ProductID
				FROM tbProduct
				WHERE TypeID =".$iID;

				$oResult = $oConnection->query($sSQL);

				while($aRow = $oConnection->fetch_array($oResult)){
					$oProduct = new Product(); //create a new product object
					$oProduct->load($aRow["ProductID"]); //load it
					$this->aProducts[]=$oProduct; //add it to the array
					//empty square bracket means add more to the end of an array
				}
				

			//close connection
			$oConnection->close_connection();
		}

		public function __get($var){
			switch($var){
				case "TypeID":
					return $this->iTypeID;
					break;
				case "TypeName":
					return $this->sTypeName;
					break;
				case "products":
					return $this->aProducts;
					break;
				default:
					die($var . "does not exist in Type");
			}

		}


	}

// $oProductType = new ProductType();
// $oProductType->load(3);

// echo "<pre>";
// print_r($oProductType);
// echo "</pre>";



 ?>