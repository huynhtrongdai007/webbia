<?php 
  require("templates/header.php");
$loi=array();
$loi["name"]=$loi["price"]=NULL;
$title_product=$image=$price=NULL;

  $id=$_GET["id"];

  if(isset($_POST["ok"]))
  {
    // lay id chuyen muc mà người dung da chinh sua
    $cate_id=$_POST["txtcate"];

     // kiem tra nguoi dung co nhap ten chua
    if(empty($_POST["txtname"]))
    {
        $loi["name"]="* Xin vui lồng nhập vào tên sản phảm";
    }else{
        $title_product=$_POST["txtname"];
    }


   if($_FILES["image"]["error"]>0) // neu61 form hình ảnh xảy ra lỏi, tức là người dùng không chọn update image 
   {
      $image="none"; // ==> viết câu truy vấn không update image
   }else{
     $image=$_FILES["image"]["name"];
   } // nếu người dùng có chọn tấm hình mới update{
   
   


 // kiem tra nguoi dung co nhap gia chua

   if(empty($_POST["txtgia"]))
   {
      $loi["price"]="* Xin vui lồng nhâp giá tiền";
   }else{
     $price=$_POST["txtgia"];
   }

    if($title_product && $image && $price)
    {
        // mo ket noi csdl
        require("../library/config.php");
        // thuc hien cau truy van
        if($image=='none') {
mysqli_query($conn,"UPDATE product set cate_id='$cate_id',title_product='$title_product',price='$price' where product_id=$id");
        }else{
            // co upload image
 mysqli_query($conn,"UPDATE product set cate_id='$cate_id',title_product='$title_product',image='$image',price='$price' where product_id=$id");

    // upload tam hình mới
    move_uploaded_file($_FILES["image"]["tmp_name"],"../library/images/".$_FILES["image"]["name"]);

        }
        // dong ket noi csdl
        mysqli_close($conn);

        header("location:list_product.php");
        exit();
    }
  }



  require("../library/config.php");

  $result=mysqli_query($conn,"SELECT cate_id,title_product,image,price  FROM product where product_id=$id");
  $data=mysqli_fetch_assoc($result);
 ?>

    
    <div id="wrapper2" style="margin-top: 20px;">
    	<fieldset>
    		<legend>Chỉnh sửa sản phẩm</legend>

    		<form action="edit_product.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    			<table>
    				<tr>
    					<td>Chuyen mục</td>
    					<td>
    					  <select  name="txtcate">
    					  	<option value="1" <?php if($data['cate_id']==1){echo 'selected="selected"';} ?>>Bia</option>
    					  	<option value="2" <?php if($data['cate_id']==2){echo 'selected="selected"';} ?>>Nước Ngọt</option>

    					  </select>
    								
    				
    					</td>
    				</tr>
    				<tr>
    					<td>Tên sản phẩm</td>
    					<td><input type="text" name="txtname" size="25" value="<?php echo $data['title_product']; ?>"></td>
    				</tr>
    				<tr>
    					<td>Hình ảnh củ</td>
    				   <td><img src="../images/<?php  echo $data['image']; ?>" /></td>

    				</tr>
    				<tr>
    					<td>Hình ảnh mới</td>
    					<td><input type="file" name="image"></td>
    				</tr>
    				<tr>
    					<td>Giá:</td>
    					<td><input type="text" name="txtgia" value="<?php echo $data['price']; ?>"></td>
    				</tr>
    				<tr>
    					<td></td>
    					<td><input type="submit" name="ok" value="Upload"></td>
    				</tr>
    			</table>
    		</form>
    	</fieldset>
    </div>




 <?php 
  require("templates/footer.php");
 ?>