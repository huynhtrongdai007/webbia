<?php 
  require("templates/header.php");
 ?>

<div id="warpper">
	<table>
		<tr style="background-color: #0f6; color: #fff;">
			<th style="width: 100px;">Đơn hàng</th>
			<th style="width: 120px;">Ngày</th>
			<th>Họ tên khách háng</th>
			<th style="width: 120px;">Tổng tiền</th>
			<th style="width: 100px;">Xem</th>
			<th style="width: 100px;">Xóa</th>
		</tr>
<?php 

require("../library/config.php");
	$result=mysqli_query($conn,"SELECT mahd,ngay,hoten,tongtien FROM hoadon order by mahd desc");
     while ($data=mysqli_fetch_assoc($result)) {
     	echo"<tr>";
			echo"<td>$data[mahd]</td>";
			$timestamp=strtotime($data['ngay']);
			$date=date("d-m-Y",$timestamp);
			echo"<td>$date</td>";
			echo"<td>$data[hoten]</td>";
			echo"<td>".number_format($data['tongtien'])."</td>";
			echo"<td><a href='detail.php?mahd=$data[mahd]' style='color: #09f;'>Xem</a></td>";
			echo"<td><a href='del_cart.php?mahd=$data[mahd]' style='color: #f3f;' onclick='return show_confirm();'>Xóa</a></td>";
		echo"</tr>";
     }

     mysqli_close($conn);
	
 ?>
	</table>


</div>




 <?php 
  require("templates/footer.php");
 ?>