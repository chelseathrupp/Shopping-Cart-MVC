<?php 

	require_once("connection.php");

	class Customer{
		private $iCustomerID;
		private $sFirstName;
		private $sLastName;
		private $sEmail;
		private $sPassword;
		private $sPostalAddress;
		private $sBillingAddress;
		private $bExisting;

		public function __construct(){
			$this->iCustomerID = 0;
			$this->sFirstName = "";
			$this->sLastName = "";
			$this->sEmail = "";
			$this->sPassword = "";
			$this->sPostalAddress = "";
			$this->sBillingAddress = "";
			$this->bExisting = false;
		}

		public function load($iID){

			$oConnection = new Connection();

			$sSQL = "SELECT CustomerID, FirstName, LastName, Email, Password, PostalAddress, BillingAddress
			FROM tbCustomer
			WHERE CustomerID = ".$iID;

			$oResult = $oConnection->query($sSQL);

			$aCustomer = $oConnection->fetch_array($oResult);

			$this->iCustomerID = $aCustomer["CustomerID"];
			$this->sFirstName = $aCustomer["FirstName"];
			$this->sLastName = $aCustomer["LastName"];
			$this->sEmail = $aCustomer["Email"];
			$this->sPassword = $aCustomer["Password"];
			$this->sPostalAddress = $aCustomer["PostalAddress"];
			$this->sBillingAddress = $aCustomer["BillingAddress"];


			$oConnection->close_connection();

			$this->bExisting = true;
		}

		public function save(){
			$oConnection = new Connection();

			if($this->bExisting ==false){

				$sSQL = "INSERT INTO tbCustomer (FirstName, LastName, Email, Password, PostalAddress, BillingAddress)
				VALUES ('".$this->sFirstName."',
						'".$this->sLastName."',
						'".$this->Email."',
						'".$this->Password."',
						'".$this->PostalAddress."',
						'".$this->BillingAddress."');";

				$bResult = $oConnection->query($sSQL);

				if($bResult == true){
					//retrieve last insert id
					$this->iCustomerID = $oConnection->get_last_id();
					$this->bExisting = true;

				}else{
					die($sSQL. "fails");
}
			}else{
				//execute update query

				$sSQL = "UPDATE tbCustomer SET CustomerID = '".$this->iCustomerID."',
								FirstName = '".$this->sFirstName."',
								LastName = '".$this->sLastName."',
								Email = '".$this->sEmail."',
								Password = '".$this->sPassword."',
								PostalAddress = '".$this->sPostalAddress."',
								BillingAddress = '".$this->sBillingAddress."'
								WHERE tbCustomer.CustomerID = ".$this->iCustomerID;

							$bResult = $oConnection->query($sSQL);

							if($bResult == false){
								die($sSQL . "false");
							}

						}; //end of else

						$oConnection->close_connection();
		
				}
		

				public function __get($var){
					switch ($var) {
						case "CustomerID":
						return $this->iCustomerID;
						break;
						case "FirstName":
						return $this->sFirstName;
						break;
						case "LastName":
						return $this->sLastName;
						break;
						case "PostalAddress":
						return $this->sPostalAddress;
						break;
						case "BillingAddress":
						return $this->sBillingAddress;
						break;
						case "Email":
						return $this->sEmail;
						break;
						case "Password":
						return $this->sPassword;
						break;
						default:
						die($var . "does not exist in Page");
					}
				}

				public function __set($var,$value){
					switch ($var) {   
						case "CustomerID":
						$this->iCustomerID = $value;
						break;
						case "FirstName":
						$this->sFirstName = $value;
						break;
						case "LastName":
						$this->sLastName = $value;
						break; 
						case "PostalAddress":
						$this->sPostalAddress = $value;
						break;
						case "BillingAddress":
						$this->sBillingAddress = $value;
						break;
						case "Email":
						$this->sEmail = $value;
						break;
						case "Password":
						$this->sPassword = $value;
						break;    
						default:
						die($var . "cannot be set in Page");
					}
				}




		}


	// $oCustomer = new Customer();
	// $oCustomer->load(1);

	// $oCustomer->FirstName = "Ruby";

	// $oCustomer->save();
	

	// echo "<pre>";
	// print_r($oCustomer);
	// echo "</pre>";



 ?>