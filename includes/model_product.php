<?php 

require_once("connection.php");

	class Product{

		private $iProductID;
		private $sProductName;
		private $fPrice;
		private $fDiscountPercentage;
		private $sColour;
		private $sStyle;
		private $sDescription;
		private $sPhotoPath1;
		private $sPhotoPath2;
		private $sPhotoPath3;
		private $sPhotoPath4;
		private $iStockLevel;
		private $iActive;
		private $iTypeID;

		public function __construct(){
			$this->iProductID = 0;
			$this->sProductName = "";
			$this->fPrice = 0;
			$this->fDiscountPercentage = 0;
			$this->sColour = "";
			$this->sStyle = "";
			$this->sDescription = "";
			$this->sPhotoPath1 = "";
			$this->sPhotoPath2 = "";
			$this->sPhotoPath3 = "";
			$this->sPhotoPath4 = "";
			$this->iStockLevel = 0;
			$this->iActive = 0;
		}

		public function load($iID){

			$oConnection = new Connection();

			$sSQL = "SELECT ProductID, ProductName, Price, DiscountPercentage, Colour, Style, Description, PhotoPath1, PhotoPath2, PhotoPath3, PhotoPath4, StockLevel, Active
			FROM tbProduct
			WHERE ProductID =" .$iID;

			$oResult = $oConnection->query($sSQL);

			$aProduct = $oConnection->fetch_array($oResult);

			$this->iProductID = $aProduct["ProductID"];
			$this->sProductName = $aProduct["ProductName"];
			$this->fPrice = $aProduct["Price"];
			$this->fDiscountPercentage = $aProduct["DiscountPercentage"];
			$this->sColour = $aProduct["Colour"];
			$this->sStyle = $aProduct["Style"];
			$this->sDescription = $aProduct["Description"];
			$this->sPhotoPath1 = $aProduct["PhotoPath1"];
			$this->sPhotoPath2 = $aProduct["PhotoPath2"];
			$this->sPhotoPath3 = $aProduct["PhotoPath3"];
			$this->sPhotoPath4 = $aProduct["PhotoPath4"];
			$this->iStockLevel = $aProduct["StockLevel"];
			$this->iActive = $aProduct["Active"];

			$oConnection->close_connection();	
			
		}


		public function __get($var){
	switch ($var) {
		case "ProductID":
		return $this->iProductID;
		break;
		case "ProductName":
		return $this->sProductName;
		break;
		case "Description":
		return $this->sDescription;
		break;
		case "Colour":
		return $this->sColour;
		break;
		case "Style":
		return $this->sStyle;
		break;
		case "Price":
		return $this->fPrice;
		break;
		case "TypeID":
		return $this->iTypeID;
		break;
		case "PhotoPath1":
		return $this->sPhotoPath1;
		break;
		case "PhotoPath2":
		return $this->sPhotoPath2;
		break;
		case "PhotoPath3":
		return $this->sPhotoPath3;
		break;
		case "PhotoPath4":
		return $this->sPhotoPath4;
		break;
		default:
		die($var . "does not exist in Page");
	}
}
	
	public function __set($var,$value){
	switch ($var) {   
		case "ProductName":
		$this->sProductName = $value;
		break;
		case "Description":
		$this->sDescription = $value;
		break; 
		case "Price":
		$this->fPrice = $value;
		break;
		case "TypeID":
		$this->iTypeID = $value;
		break;
		case "StockLevel":
		$this->iStockLevel = $value;
		break;
		case "Active":
		$this->iActive = $value;
		break; 
		case "PhotoPath1":
		$this->sPhotoPath1 = $value;
		break;
		case "PhotoPath2":
		$this->sPhotoPath2 = $value;
		break;
		case "PhotoPath3":
		$this->sPhotoPath3 = $value;
		break;
		case "PhotoPath4":
		$this->sPhotoPath4 = $value;
		break;
		default:
		die($var . "does not be set in Page");
	}
}


}



// $oProduct = new Product();

// $oProduct->load(3);

// echo "<pre>";
// print_r($oProduct);
// echo "</pre>";





	




 ?>