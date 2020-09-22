<?php 
session_start();
  require("templates/header.php");
  $loi=array();
$loi["catename"]=NULL;
$category=NULL;
 ?>
 
 <div id="wrapper2">
 	<fieldset style="width: 27px; margin: 20px auto 10px;">
 		<legend style="font-family: cursive;">Thêm Chuyên mục</legend>
 		<form action="xuly_add_category.php" method="post">
 		<table>
 			<tr>
 				<td>Name:</td>
 				<td><input type="text" size="25" name="txtname"></td>
 			</tr>
 			<tr>
 				<td></td>
 				<td><input type="submit" name="ok" value="Add"></td>
 			</tr>			
 			
 		</table>
 	</form>

 	<?php
       if (isset($_SESSION["catename"]))
        {
       echo  $_SESSION["catename"];  
       }
 	  ?>
 	</fieldset>
 	
 </div>


<?php 
  require("templates/footer.php");
 ?>