$(document).ready(function () {

    //This will initialize jquery.pngfix.js and fix the missing PNG-Transparency in Windows Internet Explorer 5.5 & 6. 
    $(document).pngFix();

})

/***************************************************
	     ACCORDIAN MENU
***************************************************/
$(function() {
	$(".menu > li > a").click(function(){
	
		if(false == $(this).next().is(':visible')) {
			$('.menu ul').slideUp(300);
			$(this).next().slideToggle(300);	
		}
		
		$(".menu > li > a").removeClass('active-parent');
		$(".menu ul.sub-menu li a").removeClass('active-child');
		$(this).addClass('active-parent');
	});
	
	$(".menu ul.sub-menu li a").click(function(){
		if(false == $(this).next().is(':visible')) {
			$(".menu ul.sub-menu li ul").next().slideUp(300);
			$(this).next().slideToggle(300);	
		}
		
		$(".menu ul.sub-menu li a").removeClass('active-child');
		$(this).addClass('active-child');

	});
	
	$(".menu ul.sub-menu li a").click(function(){
		
		$(".menu ul.sub-menu li a").removeClass('active-child');
		$(this).addClass('active-child');
		
		$active_child = $(".menu ul.sub-menu li").parent().prev().addClass('active-child');

	});
	
	$('#contact-widget > cufon').remove();
	
});