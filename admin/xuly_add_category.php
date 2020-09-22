<?php 
session_start();

$loi=array();
$loi["catename"]=$_SESSION["catename"]=NULL;
$category=NULL;
 if(isset($_POST["ok"]))
 {
 	if(empty($_POST["txtname"]))
 	{
 		$loi["catename"]="* Xin vui lòng nhập vào Name";
 	}else{
 		$category=$_POST["txtname"];
 	}

 	if($category)
 	{
 		require("../library/config.php");
 		mysqli_query($conn,"INSERT INTO category(cate_title)
 			value('$category')");
 		mysqli_close($conn);
 	}
	$_SESSION["catename"]=$loi["catename"];

 	
 }


    header("location:add_category.php");

    exit();	


 ?>