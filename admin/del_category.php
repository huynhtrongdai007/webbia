<?php 
  $id=$_GET["id"];

require("../library/config.php");
mysqli_query($conn,"DELETE FROM category where cate_id=$id");

mysqli_close($conn);

header("location:list_category.php");
exit();

 ?>