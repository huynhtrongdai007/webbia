<?php 
  $id=$_GET["id"];

require("../library/config.php");

  mysqli_query($conn,"DELETE FROM product where product_id=$id");

    mysqli_close($conn);

    header("location:list_product.php");
    exit();

 ?>