<?php 

session_start();
unset($_SESSION["CustomerID"]);
//redirect
header("Location:index.php");
?>