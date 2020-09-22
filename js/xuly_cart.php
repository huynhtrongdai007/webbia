<?php 
session_start();
$soluongmoi=$_POST['sml'];
$product_id=$_POST['product_id'];
$_SESSION['cart'][$product_id]=$soluongmoi;

 ?>