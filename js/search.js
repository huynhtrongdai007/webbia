$(document).ready(function() {
	$("#txtsearch").keyup(function() {
		k=$("#txtsearch").val();
	        if(k==""){
                   $(".search-quick").css("display","none");
	        }else{
		$.ajax({
            url:"js/xuly_search.php",  
            type:"get",
            data:"keyword="+k,
            async:true,
            success:function(kq){
                   $(".search-quick").html(kq);
                   $(".search-quick").css("display","block");
            }
		});
		return false;
	   }
	});
});