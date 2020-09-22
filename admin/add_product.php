<?php 
  require("templates/header.php");

$loi=array();
$loi["name_product"]=$loi["image"]=$loi["price"]=NULL;
$title_product=$image=$price=NULL;
if (isset($_POST["ok"])) {
	$cate_id=$_POST["cate_id"];

	//check nguoi dung co nhap name chua
	if(empty($_POST["txtname"])){
		$loi["name_product"]="* Xin vui lồng nhập vào tên sản phẩm<br/>";
	}else{
		$title_product=$_POST["txtname"];
	}
   
   // check co nhap vao hinh anh chua
	if($_FILES["image"]["error"]>0){
       $loi["image"]="* Xin vui lồng chon hình<br/>";
	}else{
		$image=$_FILES["image"]["name"];
	}

	// check co nhap vao gia chua

   if(empty($_POST["txtprice"])){
   	 $loi["price"]="* xin vui lồng nhập giá tiền<br/>";
   }else{
   	 $price=$_POST["txtprice"];
   }

  if ($title_product && $image && $price) {
  	// mo ket noi csdl
  	require("../library/config.php");
  	   // thuc hien cau truy van 
  	mysqli_query($conn,"INSERT INTO product (title_product,image,price,cate_id)
  		                              value('$title_product','$image','$price','$cate_id')");

  	mysqli_close($conn);

  }


}


 ?>


<div id="warpper2">
	<fieldset style="width: 600px; margin: 20px auto; padding: 10px;">
		<legend>Thêm Sản Phảm</legend>
		<form action="add_product.php" method="post" enctype="multipart/form-data">
			<table style="padding: 10px;">
				<tr>
				     <td>
				     	<select name="cate_id">
				     		<option value="1">Bia</option>
				     		<option value="2">Nước Ngọt</option>
				     	</select>
				     </td>
				</tr>
				<tr>
					<td>Tên Sản Phảm</td>
					
					<td><input type="text" name="txtname" size="25"></td>
				</tr>
				<tr>
					<td>Hình Ảnh</td>
					<td><input type="file" name="image"></td>
				</tr>
				<tr>
					<td>Giá:</td>
					<td><input type="text" name="txtprice"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok" value="add"></td>
				</tr>
			</table>
		</form>
	</fieldset>
	<div style="width: 270px; color: red; margin: 20px auto; text-align: center;">
		<?php 
          echo $loi["name_product"];
          echo $loi["image"];
          echo $loi["price"];
		 ?>
	</div>
</div>



 <?php 
  require("templates/footer.php");
 ?>