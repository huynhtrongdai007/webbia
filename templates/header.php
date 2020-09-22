<?php 
$flag=NULL;

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="templates/style.css">
   <script src="js/jquery.js"></script>
   <script src="js/cart.js"></script>
   <script src="js/search.js"></script>
   <script src="js/quangcao.js"></script>
   <script src="js/quangcao_left.js"></script>
   <script src="js/quangcao_silder_right.js"></script>
</head>
<body> 
    
   <div id="wrapper">
   	    <div id="logo"><img src="images/game.jpg" width="100" height="80"></div>

         <div id="das">
          <?php
           if(isset($_SESSION["username"]))
          {

            echo"<span style='color:#fff;font-family: cursive;'>Welcom </span>". $_SESSION["username"]."<a href='logout.php'>Logout</a>";
          }
              echo"<div id='login'><a href='login.php'><span style='color:blue;font-family: cursive;'>Đăng Nhập</span></a></div>";
              echo"<div id='register'><a href='register.php'><span style='color:blue;font-family: cursive;'>Đăng Ký</span></a></div>";
           ?>  
        </div>
       
 
         <div id="search">
          <form action="search.php" method="get">
            <input type="text" name="keyword" size="40" placeholder="Search..." id="txtsearch"/>
            <input type="submit" id="txtsubmit" size="30" style="background-image: url(images/icon-search.png);">
          </form>
           <ul class="search-quick">
                
          </ul>
        </div>
   	   
   	     <div style="clear: both;"></div>

         <div id="shopping-cart"><a href="cart.php"><img src="images/cart.png"></a>
          <?php 
             
        if(!isset($_SESSION['cart'])){// ban dau,neu nguoi dung chua mua hang 
         
             $flag=false;
              }else{// nguoc lai,neu nguoi dung da mua hang
                foreach($_SESSION['cart'] as $product_id => $soluong) {               
                if(isset($product_id)){  // da mua hang va cac san pham van con trong gia hang
                $flag=true;
              }else{
                // da nua hang cac san pham da bi xoa het, khong con trong gio hang
                $flag=false;
                }
               }
              }

              if ($flag==false) {
                
                echo"<p style='float: right; margin:5px 10px 5px 0; color: #f00;'>0 :san pham</p>";
              }else{
                $cart=$_SESSION['cart'];
                echo" ".count($cart).":<span style='color:#f00; margin-bottom:5px;'>san pham</span>";
              }

          ?>
         
        </div>
       	<div id="menu">
       			<ul>
       				<li style="border-left: none;"><a href="index.php">Trang Chủ</a></li>
              <?php
               require("library/config.php");
               $result=mysqli_query($conn,"SELECT  cate_title,cate_id  FROM category");
                while ($data=mysqli_fetch_assoc($result)) {
                     echo"<li><a href='all_detail.php?cate_id=$data[cate_id]'>$data[cate_title]</a></li>";
                 } 

               mysqli_close($conn);
             
               ?>
       		
       			  <li><a href="#">Liên hệ</a></li>
       			</ul>
       	</div>
       	<div style="clear: both;"></div>
 



 <div id="quangcao-right">
     <div id="eixt_quangcao_right">
      <a href="javascript:void(0)" onclick="hide_quangcao_right();">tắt quảng cáo [X]</a>
    </div>
        <div id="content_quangcao_right">
          <a href=""><img src="images/lienquan.jpg" width="300" height="250"></a>
        </div>
      <div id="look_quangcao_right">
           <a href="javascript:void(0)" onclick="block_quangcao_right();">xem quảng cáo...</a>
      </div>
 </div>

 <div id="quangcao-left">
        <div id="content_quangcao_left">
          <a href="https://www.youtube.com/watch?v=E4uE7bTNhB4"><img src="images/spiderman.jpg" width="150" height="500"></a>
        </div>
 </div>

 




       <!--  <ul class="submenu">
                      <li><a href="#">Bia Sài Gòn Đỏ</a></li>
                      <li><a href="#">Bia Sài Gòn Xanh</a></li>
                      <li><a href="#">Bia Sài Tiger</a></li>
                      <li><a href="#">Bia Sài heineken</a></li>
                      <li><a href="#">Bia 333</a></li>
                       <li><a href="#">Bia Sư Tử Trắng</a></li>
                   </ul> -->

                    <!--  <ul class="submenu">
                          <li><a href="#">Xá Xị</a></li>
                          <li><a href="#">Cam</a></li>
                          <li><a href="#">Trái Giải</a></li>
                          <li><a href="#">Number One</a></li>
                          <li><a href="#">Sting</a></li>
                          <li><a href="#">Sữa bò</a></li>
                          <li><a href="#">Sữa Đậu Nành</a></li>
                        </ul> -->