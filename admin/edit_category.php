<?php 
  require("templates/header.php");
    $id=$_GET["id"];
$loi=array();
$loi["catename"]=NULL;
$catename=NULL;



  if(isset($_POST["ok"]))
  {
  	if(empty($_POST["txtname"]))
  	{
  	 $loi["catename"]="* Xin nhập vào Name";
  	}
  	else{
  	$catename=$_POST["txtname"];
  }
   
   if($catename){
   	require("../library/config.php");
   	mysqli_query($conn,"UPDATE  category set cate_title='$catename' where cate_id=$id");

   	mysqli_close($conn);
   	header("location:list_category.php");
   	exit();
   }
 }




   require("../library/config.php");
  $result=mysqli_query($conn,"SELECT cate_title FROM category where cate_id=$id");
  $data=mysqli_fetch_assoc($result);
 ?>

<div id="wrapper2">
	<fieldset style="width: 27px; margin: 20px auto 10px;">
		<legend style="font-family: cursive;">Chỉnh sửa chuyên mục</legend>
		<form action="edit_category.php?id=<?php echo $id; ?>" method="post">
			<table>
				<tr>
					<td style="font-family: cursive;">Name:</td>
					<td><input type="text" name="txtname" size="25" value="<?php echo $data['cate_title'];?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok" value="Update"></td>
				</tr>
			</table>
		</form>
		<?php 
           echo $loi["catename"];
		 ?>
		
	</fieldset>
</div>

       
<?php 
mysqli_close($conn);
  require("templates/footer.php");
 ?>