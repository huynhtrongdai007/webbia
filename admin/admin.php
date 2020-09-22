<?php 
session_start();
if($_SESSION["level"]==2){
header("location:list_user.php");
exit();
}else{

	header("location:../index.php");
	exit();
}




 ?>
