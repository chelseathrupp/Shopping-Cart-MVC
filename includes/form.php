<?php 

	class Form{

		private $sHTML;
		private $aData;
		private $aErrors;

		public function __construct(){
			$this->sHTML = '<form action="" method="post">';
			$this->aData = array();
			$this->aErrors = array();
		}

		public function makeTextInput($sLabel, $sControlName, $sInputType){

			//geting controls data
			$sData = "";

			if(isset($this->aData[$sControlName])){
				$sData = $this->aData[$sControlName];
				//if data exists in the aData array for this
				//control name, put the $sData text inside it
				//under the key with this control name
			}

			$sErrors = "";
			if(isset($this->aErrors[$sControlName])){
				$sErrors = $this->aErrors[$sControlName];
			}

			$this->sHTML .='<label for="'.$sControlName.'">'.$sLabel.'</label><br><input type="'.$sInputType.'" 
			id="'.$sControlName.'" name="'.$sControlName.'" value="'.$sData.'"><br>';
			$this->sHTML .='<span>'.$sErrors.'</span>';
			
		}

		public function makeTextArea($sLabel, $sControlName){

			//getting controls data
			$sData = "";

			if(isset($this->aData[$sControlName])){
				$sData = $this->aData[$sControlName];
				//if data exists in the aData array for this
				//control name, put the $sData text inside it
				//under the key with this control name
			}

			$sErrors = "";
			if(isset($this->aErrors[$sControlName])){
				$sErrors = $this->aErrors[$sControlName];
			}

			$this->sHTML .= '<label for="'.$sControlName.'">'.$sLabel.'</label><br><textarea id="'.$sControlName.'" name="'.$sControlName.'"></textarea><br>';
			$this->sHTML .='<span>'.$sErrors.'</span>';
		}



		public function makeSubmit($sLabel, $sControlName){
			$this->sHTML .='<input type="'.$sControlName.'" name="'.$sControlName.'" value="'.$sLabel.'">';
		}

		 
		 public function checkMatching($sControlName_1, $sControlName_2){

  
	    $sData_1="";
	    $sData_2="";

	    if(isset($this->aData[$sControlName_1])){
	      $sData_1 = $this->aData[$sControlName_1];
	    }

	     if(isset($this->aData[$sControlName_2])){
	      $sData_2 = $this->aData[$sControlName_2];
	    }

	    if($sData_1 != $sData_2){
	       $this->aErrors[$sControlName_1] = "Values don't match";
   		 }

 		 }

		public function checkRequired($sControlName){

			$sData = "";
			if(isset($this->aData[$sControlName])){
				$sData = $this->aData[$sControlName];
			}

			if(trim($sData)==""){
				$this->aErrors[$sControlName] = "Required Field";
			}
		}

		public function raiseCustomError($sControlName,$sErrorMessage){
			$this->aErrors[$sControlName] = $sErrorMessage;
		}

		public function __get($var){
			switch($var){
				case 'html':
				return $this->sHTML . "</form>";
				break;
				case 'data':
				return $this->aData;
				break;
				case "isValid":
					if(count($this->aErrors) == 0){
			            return true;
			          }else{
			            return false;
			          }
				default:
				die($var." does not exist in form");
			}
		}

		public function __set($var, $value){
			switch($var){
				case 'data':
				$this->aData = $value;
				break;
				default:
				die($var." cannot be set in form");
			}
		}



	}


 ?>