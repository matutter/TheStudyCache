$(document).ready(function(){
	//initial  states
	$('div.profile').hide();
	$('div.workbook').hide();
	$('div.upload').hide();
	//content behavior
	$(function(){
		$('li.home').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        		$('div.home').show().siblings().hide();
		});
		$('li.profile').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        	        $('div.profile').show().siblings().hide();
		});
		$('li.workbook').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        		    $('div.workbook').show().siblings().hide();
		});
		$('li.upload').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        		 $('div.upload').show().siblings().hide();
		});
	});


});




///////////////////////////////////////////////////////////////////////////
// NOTE: interesting behavior
//$(this).addClass('active').siblings().removeClass('disable');// allows multiple things selected
/////////////////////////////////////////////////
//	nav toggle without content refresh

	// what button clicks will do
	// animation for tab selection
//	$(function(){
//	    $('.nav li').click(function(){
//	        $(this).addClass('active').removeClass('disable');
//	        $(this).siblings().removeClass('active').addClass('disable');
//	    });
//	});