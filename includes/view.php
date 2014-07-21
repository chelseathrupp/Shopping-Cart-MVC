<?php 

	class View{


		function renderNavigation($aTypeList){

			$sHTML = "";

			$sHTML = "<ul>";

			for($i=0;$i<count($aTypeList);$i++){
				$oProductType = $aTypeList[$i];


			//CHANGE THIS AT THE END
			if((isset($_GET['typeid'])) && ($_GET['typeid'] == $oProductType->TypeID)){ 

				$sHTML.= '<li><a class="current" href="productcatalogue.php?typeid='.$oProductType->TypeID.'">'.$oProductType->TypeName.'</a></li>';

			}else{

				$sHTML.= '<li><a href="productcatalogue.php?typeid='.$oProductType->TypeID.'">'.$oProductType->TypeName.'</a></li>';
			}
						
				
			}
		
		$sHTML .= "</ul>";

			return $sHTML;

		}

		
		function renderCategory($oProductType){

			$aProducts = $oProductType->products;
				$sHTML = "";
			for($i=0;$i<count($aProducts);$i++){

				$oProduct = $aProducts[$i];

				$sHTML .= '<div class="product">';
				$sHTML .='<img src="assets/images/'.$oProduct->PhotoPath1.'" alt="">';
				$sHTML .='<img src="assets/images/'.$oProduct->PhotoPath2.'" alt="">';
				$sHTML .='<p><a href="productdetailpage.php?productid='.$oProduct->ProductID.'">'.$oProduct->ProductName.'</a><br>';
				$sHTML .='<span>NZD $'.$oProduct->Price.'</span></p>';
				$sHTML .='<div class="quickLook" onclick="showQuickLook()">';
				$sHTML .='<p>QUICK LOOK</p>';
				$sHTML .='</div>';
				$sHTML .='</div>';
				
			}
			
			return $sHTML;

		}


				function renderProductDetailPage($oProduct){

				$sHTML = '<div id="productViewer">';
				$sHTML .= '<div id="productPicker">';
				$sHTML .= '<img src="assets/images/'.$oProduct->PhotoPath1.'" alt="">';
				$sHTML .= '<img src="assets/images/'.$oProduct->PhotoPath3.'" alt="">';
				$sHTML .= '<img src="assets/images/'.$oProduct->PhotoPath4.'" alt="">';
				$sHTML .= '</div>';
				$sHTML .= '<div id="productMain">';
				$sHTML .= '<img src="assets/images/'.$oProduct->PhotoPath1.'" alt="">';
				$sHTML .= '</div>';
				$sHTML .= '</div>';
				$sHTML .= '<div id="productDetailBox">';
				$sHTML .= '<h2>'.$oProduct->ProductName.'</h2>';
				$sHTML .= '<p>NZD '.$oProduct->Price.'<br><br><br>';
				$sHTML .= ''.$oProduct->Description.'';
				$sHTML .= '<br><br>Style No. #1843<br><br><br>';
				$sHTML .= 'Select Size:</p>';
				$sHTML .= '<select>';
				$sHTML .= '<option value="Extra Small">Extra Small</option>';
				$sHTML .= '<option value="Small">Small</option>';
				$sHTML .= '<option value="Medium">Medium</option>';
				$sHTML .= '<option value="Large">Large</option>';
				$sHTML .= '<option value="Extra Large">Extra Large</option>';
				$sHTML .= '</select><br><br><br>';
				$sHTML .= '<a href="Add To WishList">Add To Wishlist</a>';
				$sHTML .= '</p>';
				$sHTML .= '<br>';
				$sHTML .= '<a class="addToCart"href="#">ADD TO CART</a>';
				$sHTML .= '</div>';
				
				return $sHTML;
		
			}


				function renderQuickLook($oProduct){

				$sHTML = '<div id="productViewerQuickLook">';
				$sHTML .= '<div id="productPickerQuickLook">';
				$sHTML .= '<img src="assets/images/'.$oProduct->PhotoPath1.'" alt="">';
				$sHTML .= '<img src="assets/images/'.$oProduct->PhotoPath3.'" alt="">';
				$sHTML .= '<img src="assets/images/'.$oProduct->PhotoPath4.'" alt="">';
				$sHTML .= '</div>';
				$sHTML .= '<div id="productMainQuickLook">';
				$sHTML .= '<img src="assets/images/'.$oProduct->PhotoPath1.'" alt="">';
				$sHTML .= '</div>';
				$sHTML .= '</div>';
				$sHTML .= '<div id="productDetailBoxQuickLook">';
				$sHTML .= '<h2>'.$oProduct->ProductName.'</h2>';
				$sHTML .= '<p>NZD '.$oProduct->Price.'<br><br><br>';
				$sHTML .= ''.$oProduct->Description.'';
				$sHTML .= '<br><br>Style No. #1843<br><br><br>';
				$sHTML .= 'Select Size:</p>';
				$sHTML .= '<select>';
				$sHTML .= '<option value="Extra Small">Extra Small</option>';
				$sHTML .= '<option value="Small">Small</option>';
				$sHTML .= '<option value="Medium">Medium</option>';
				$sHTML .= '<option value="Large">Large</option>';
				$sHTML .= '<option value="Extra Large">Extra Large</option>';
				$sHTML .= '</select><br><br><br>';
				$sHTML .= '<a href="Add To WishList">Add To Wishlist</a>';
				$sHTML .= '</p>';
				$sHTML .= '<br>';
				$sHTML .= '<a class="addToCart"href="#">ADD TO CART</a>';
				$sHTML .= '</div>';
				
				return $sHTML;
		
			}
		
	}
 ?>