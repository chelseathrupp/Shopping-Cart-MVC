<?php 

	class Form{

		private $sHTML;
		private $aData;

		public function __construct(){
			$this->sHTML = '<form action="" method="post">';
			$this->aData = array();


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

			$this->sHTML .='<label for="'.$sControlName.'">'.$sLabel.'</label><br><input type="'.$sInputType.'" 
			id="'.$sControlName.'" name="'.$sControlName.'" value="'.$sData.'"><br>';
			
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

			$this->sHTML .= '<label for="'.$sControlName.'">'.$sLabel.'</label><br><textarea id="'.$sControlName.'" name="'.$sControlName.'"></textarea><br>';
		}



		public function makeSubmit($sLabel, $sControlName){
			$this->'<input type="'.$sControlName.'" name="'.$sControlName.'" value="'.$sLabel.'">';
		}


		public function __get($var){
			switch($var){
				case 'html':
				return $this->sHTML . "</form>";
				break;
				case 'data':
				return $this->aData;
				break;
				case 'isValid':
				if(count($this->aErrors) = 0){
					return true;
				}
				default:
				die($var."does not exist in form");
			}
		}

		public function __set($var, $value){
			switch($var){
				case 'data':
				$this->aData = $value;
				break;
				default:
				die($var."cannot be set in form");
			}
		}



	}


 ?>