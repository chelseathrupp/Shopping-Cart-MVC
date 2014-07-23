<?php 

	class Cart{

		private $aContents;

		public function __construct(){
			$this->aContents = array();
		}

		public function add($iProductID){

			if(isset($this->aContents[$iProductID]) == false){ //if this productID DOES NOT exist...
				$this->aContents[$iProductID] = 1; //make the quantity (value to the productid key) 1
			}else{
				$this->aContents[$iProductID] +=1; //if it does exist, add one more to the quantity
			}
		}

		public function remove($iProductID){
			$this->aContents[$iProductID] -=1;

			if($this->aContents[$iProductID] == 0){
				unset($this->aContents[$iProductID]);
			}
		}

		 public function __get($var){
  		switch($var){
  			case "contents":
  			return $this->aContents;
  			break;
        	case "total":
        	$fTotal = 0;
        	foreach($this->aContents as $key=>$value){
          	$oProduct = new Product();
          	$oProduct->load($key);
          	$fTotal+= $value*$oProduct->Price;
        }
  			default:
  			die($var . "does not exist in cart");
  		}
  }
	}

 ?>