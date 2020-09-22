<?php 
  require("templates/header.php");
 ?>

       <div id="warpper">
       	 <table>
          <tr>
            
            <td colspan="2"></td>
            <td colspan="2"><a href="add_category.php">Thêm chuyên mục</a></td>
          </tr>
      	<tr style="background-color: #0c6; color: #fff; font-family: cursive;">
      		<th>STT</th>
      		<th>Tên chuyên mục</th>
            <td>Edit</td>
      		<th>Delete</th>
      	</tr>
        <?php 
          // mo ket noi csdl
        require("../library/config.php");
        // thuc hien cau truy van
         $stt=1;
        $result=mysqli_query($conn,"SELECT cate_id,cate_title FROM category");
           while ($data=mysqli_fetch_assoc($result)) {      
              echo"<tr>";
              echo"<td>$stt</td>";
              echo"<td>$data[cate_title]</td>";
              echo"<td><a href='edit_category.php?id=$data[cate_id]'>Edit</a></td>";
              echo"<td><a href='del_category.php?id=$data[cate_id]' onclick='return show_confirm();' style='color: #f3f;'>Delete</a></td>";
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