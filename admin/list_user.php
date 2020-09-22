<?php 
  require("templates/header.php");
 ?>

       <div id="warpper">
       	 <table>
      	<tr style="background-color: #0c6; color: #fff; font-family: cursive;">
      		<th>STT</th>
      		<th>Username</th>
      		<th>Email</th>
      		<th>Phone</th>
      		<th>Level</th>
      		<th>Delete</th>
      	</tr>
        <?php
        // mo ket noi csdl
        require("../library/config.php");
        // thuc hien cau truy van
        $result=mysqli_query($conn,"SELECT user_id,username,email,sdt,level FROM user");
        $stt=1;
         while ($data=mysqli_fetch_assoc($result)) {
              echo"<tr>";
              echo"<td>$stt</td>";
              echo"<td>$data[username]</td>";
              echo"<td>$data[email]</td>";
              echo"<td>$data[sdt]</td>";
              if($data['level']==1){
               echo"<td>Thành viên</td>";
              }else{
                echo"<td>Admin</td>";
              }
              echo"<td><a href='del_user.php?id=$data[user_id]' onclick='return show_confirm();' style='color: #f3f;'>Delete</a></td>";
              echo"</tr>";
              $stt++;
         }
              // dong ket noi csdl
         mysqli_close($conn);
        ?>
      </table>
       </div>
<?php 
  require("templates/footer.php");
 ?>