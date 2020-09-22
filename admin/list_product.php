<?php 
  require("templates/header.php");
 ?>

       <div id="warpper">
       	 <table>
          <tr>  
            <td colspan="3"></td>
            <td colspan="3"><a href="add_product.php">Thêm sản phẩm</a></td>
          </tr>
      	<tr style="background-color: #0c6; color: #fff; font-family: cursive;">
      		<th>STT</th>

      		<th>Tên sản phảm</th>
           <td>Hình ảnh</td>
           <td>Giá</td>
            <td>Edit</td>
      		<th>Delete</th>
      	</tr>
        <?php 
        require("../library/config.php");
        $result=mysqli_query($conn,"SELECT product_id,title_product,image,price  FROM product");
        $stt=1;
         while ($data=mysqli_fetch_assoc($result)) {
            echo"<tr>";
              echo"<td>$stt</td>";
              echo"<td>$data[title_product]</td>";
              echo"<td><img src='../images/$data[image]' width='30'></td>";
              echo"<td>".number_format($data['price'])."</td>";
              echo"<td><a href='edit_product.php?id=$data[product_id]'>Edit</a></td>";
              echo"<td><a href='del_product.php?id=$data[product_id]' onclick='return  show_confirm();' style='color: #f3f;'>Delete</a></td>";
          echo"</tr>";
          $stt++;
         }
         

          mysqli_close($conn);
         ?>
      	

      </table>
       </div>
       
<?php 
  require("templates/footer.php");
 ?>