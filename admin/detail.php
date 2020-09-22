<?php 
  require("templates/header.php");
  $mahd=$_GET['mahd'];
 ?>

<div id="warpper">
	<?php 
     require("../library/config.php");
     $result=mysqli_query($conn,"SELECT mahd,ngay,hoten,sdt,diachi,tongtien FROM hoadon");
     $data=mysqli_fetch_assoc($result);

	echo"<div style='border: 1px solid #0c6; margin: 10px 0; padding: 10px;'>";
	$timestamp=strtotime($data['ngay']);
	$date=date("d-m,Y",$timestamp);
	echo"<p>Đơn hàng: <i>#$data[mahd]</i>---Ngày <i>$date</i></p>";
	echo"<p>Họ tên: <i>$data[hoten]</i>--Điên thoại <i>$data[sdt]</i></p>";
	echo"<p>Địa chỉ: <i>$data[diachi]</i></p>";
	echo"</div>";
?>


<table>
	<tr style="background-color: #0f6;color: #fff;">
		<th style="width: 100px;">STT</th>
		<th style="width: 120px;">Hình ảnh</th>
		<th>Tên sản phẩm</th>
		<th style="width: 120px;">số lượng</th>
		<th style="width: 100px;">Đơn giá</th>
		<th style="width: 100px;">Thành tiền</th>
	</tr>
<?php 
 require("../library/config.php");
 $result2=mysqli_query($conn,"SELECT  product_id,soluong FROM chitiet_hoadon where mahd=$mahd");
 $stt=1;
 while ( $data2=mysqli_fetch_assoc($result2)){
 	$result3=mysqli_query($conn,"SELECT  image,title_product,price FROM product where product_id=$data2[product_id]");
 	$data3=mysqli_fetch_assoc($result3);
 	echo"<tr>";
		echo"<td>$stt</td>";
		echo"<td> <img src='../images/$data3[image]' width='30'/></td>";
		echo"<td>$data3[title_product]</td>";
		echo"<td>$data2[soluong]</td>";
		echo"<td>".number_format($data3['price'])."</td>";
		echo"<td>".number_format($data3['price']*$data2['soluong'])."</td>";
	echo"</tr>";

	$stt++;
 }
	

	echo"<tr>";
		echo"<td colspan='4'></td>";
		echo"<td>Tổng tiền</td>";
		echo"<td><i>".number_format($data['tongtien'])."</i></td>";
	echo"</tr>";

	mysqli_close($conn);
	 ?>
</table>

 <?php 
  require("templates/footer.php");
 ?>