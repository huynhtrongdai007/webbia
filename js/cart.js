$(document).ready(function() {
	
$(".quanly").change(function(){
	sml=$(this).val();
	product_id=$(this).attr("data-product_id");
   
    $.ajax({
    	url:"js/xuly_cart.php",
    	type:"post",
    	data:"sml="+sml+"&product_id="+product_id,
    	async:true,
    	success:function(kq){
            location.reload();
    	}

    });


});


});