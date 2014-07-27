<?php 

require_once("includes/model_cart.php");


session_start();
$oCart = $_SESSION["Cart"];

	$iProductID = 1;
	if(isset($_GET["productid"])){
  	$iProductID = $_GET["productid"];
	}


	$oCart->remove($iProductID);
	Header("location:cart.php");

 ?>