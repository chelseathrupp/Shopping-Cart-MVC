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
				$sHTML .= '<a class="addToCart"href="addtocart.php?productid='.$oProduct->ProductID.'">ADD TO CART</a>';
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

			public function renderShoppingCart($oCart){

				$sHTML = "";

				$aShoppingCartProducts = $oCart->contents;
				foreach($aShoppingCartProducts as $ProductID=>$Quantity){

					$oProduct = new Product();
					$oProduct->load($ProductID);

					$sHTML .='<table class="outsideTable">
				<tr>
					<th></th>
					<th>DETAILS</th>
					<th>SHIPPING</th>
					<th>PRICE</th>
				<tr>';

					$sHTML.='<tr>
					<td><img src="assets/images/'.$oProduct->PhotoPath1.'" alt=""></td>
					<td>

						<table class="insideTable">
							<tr><td><p class="productName">'.$oProduct->ProductName.'<br>
								Womens Tops</p></td></tr>
							<tr><td><p>Colour: '.$oProduct->Colour.'
							<br>Style: '.$oProduct->Style.'</p></td></tr>
							<tr><td><p>Quantity:'.$Quantity.'</p></td></tr>

						</table>
					</td>';

					$sHTML.='<td>
						<table class="insideTable">
							<tr><td><p>1-4 business days<br>
							3HR delivery not available. <br>Item sent from our warehouse</p></td></tr>
							<tr><td><p></p></td></tr>
							<tr><td><p><a class="wishlistIcon" href="">Move To Wishlist</a></p></td></tr>

					</td>
						</table>';

					$sHTML.='<td>
						<table class="insideTable">
							<tr><td><p>$'.$oProduct->Price.'</p></td></tr>
							<tr><td><p></p></td></tr>
							<tr><td><p>&nbsp;<br>&nbsp;<br><a class="removeitemIcon" href="removefromcart.php?productid='.$oProduct->ProductID.'">Remove Item</a></p></td></tr>

							</table>
							</tr>
							</td>
							</table>';
						}

					return $sHTML;
		
				}

				public function renderOrderSummary($oCart){

					$sHTML = "";
					$fSubTotal = 0;
					$fGrandTotal = 0;
					$aShoppingCartProducts = $oCart->contents;
					foreach($aShoppingCartProducts as $ProductID=>$Quantity){

					$oProduct = new Product();
					$oProduct->load($ProductID);
					$fSubTotal += $Quantity*$oProduct->Price;
					$fGrandTotal += $Quantity*$oProduct->Price;

					$sShippingPrice = "$7.99";
					if($fSubTotal>150){
						$sShippingPrice = "FREE";
						$fGrandTotal = $fGrandTotal-7.99;
					}else{
						$fGrandTotal +=7.99;
					}

				}	

					$sHTML .='<table>
					<tr>
						<th>Order Summary</th>
					</tr>
					<tr>
						<td>SUBTOTAL: &nbsp;&nbsp;&nbsp;&nbsp; $'.$fSubTotal.'</td>
					</tr>
					<tr>
						<td>SHIPPING: &nbsp;&nbsp;&nbsp;&nbsp;'.$sShippingPrice.'</td>
					<tr>
						<td class="orderSummaryTotal">TOTAL &nbsp;&nbsp;&nbsp;NZD $'.$fGrandTotal.'</td>
					</tr>
					
				</table>';

			return $sHTML;

				}
		
	}
 ?>