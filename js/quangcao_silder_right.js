$(document).ready(function() {
	function starSlider(){
	interval=setInterval(function(){
           $('#main-left ul').animate(1000,function(){
           	$('#main-left ul li:first').appendTo('#main-left ul');
           	$('#main-left ul').css('margin-left',0);
      });
	},3000);

}
function pauseSlider(){
	clearInterval(interval);
}
$('#main-left ul').on('mouseenter',pauseSlider).on('mouseleave',starSlider);

starSlider();

});