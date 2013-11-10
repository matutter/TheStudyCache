$(document).ready(function(){
	//initial  states
	$('div.home').load('../classes/home.php');
	//$('div.upload').load('../classes/upload.php');
	//content behavior
	// primary nav tabs
	$(function(){
		$('li.home').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        		$('div.home').load('../classes/home.php').show().siblings().hide();
		});
		$('li.profile').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        		$('div.profile').load('../classes/profile.php').show().siblings().hide();
		});
		$('li.workbook').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        		$('div.workbook').load('../classes/workbook.php').show().siblings().hide();
		});
		$('li.upload').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        		$('div.upload').load('../classes/upload.php').show().siblings().hide();
		});
		//end nav tabs

  		



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

