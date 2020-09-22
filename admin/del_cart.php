<?php 

$mahd=$_GET["mahd"];

require("../library/config.php");
mysqli_query($conn," DELETE FROM hoadon where mahd=$mahd");
mysqli_close($conn);
header("location:list_cart.php");
exit();
 ?>