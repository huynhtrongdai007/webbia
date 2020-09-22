<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
      <script type="text/javascript">
    function show_confirm() 
    {
       
       if(confirm("Bạn có chắc chấn muốn dòng dữ liệu này"))
       {
        return true;
       }

    else
    {
      return false;
    }
  }
  </script>
<body>

      <div id="top">
      	<h3 style="font-family: cursive;">Webcom Admin <a href="../logout.php">(logout)</a></h3>
      </div>
      <div id="menu">
      	 <ul>
      	    <li><a href="list_user.php">Quản lý thành viên</a></li>
      	    <li><a href="list_category.php">Quản lý chuyên mục</a></li>
      	    <li><a href="list_comment.php">Quản lý bình luận</a></li>
      	    <li><a href="list_product.php">Quản lý sản phẩm</a></li>
      	    <li><a href="list_cart.php">Quản lý giỏ hàng</a></li>
      	 </ul>

      </div>
       <div style="clear: both;"></div>