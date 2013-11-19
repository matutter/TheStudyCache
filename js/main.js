$(document).ready(function(){
	//initial  states
	$('div.home').load('../classes/home.php');
	//$('div.upload').load('../classes/upload.php');
	//content behavior
	// primary nav tabs
	$(function(){

		var hash = window.location.hash;
		var res = hash.match(/[a-zA-Z]/g);
/* //alternative router
	function locationHashChanged() {
		var hash = window.location.hash;
		var res = hash.match(/[a-zA-Z]/g);

		if(res=='h') {
			$('li.home').addClass('active').removeClass('disable');
		       	$('li.home').siblings().removeClass('active').addClass('disable');
		       		$('div.home').load('../classes/home.php').show().siblings().hide();
		}
		else if(res=='p') {
			$('li.profile').addClass('active').removeClass('disable');
		       	$('li.profile').siblings().removeClass('active').addClass('disable');
		       		$('div.profile').load('../classes/profile.php').show().siblings().hide();
		}
		else if(res=='w') {
			$('li.workbook').addClass('active').removeClass('disable');
		       	$('li.workbook').siblings().removeClass('active').addClass('disable');
		       		$('div.workbook').load('../classes/workbook.php').show().siblings().hide();
		}
		else if(res=='u') {
			$('li.upload').addClass('active').removeClass('disable');
		       	$('li.upload').siblings().removeClass('active').addClass('disable');
		       		$('div.upload').load('../classes/upload.php').show().siblings().hide();
		}
		else if(res=='b') {
			 $('li.browse').addClass('active').removeClass('disable');
		       	$('li.browse').siblings().removeClass('active').addClass('disable');
		       		$('div.browse').load('../classes/browse.php').show().siblings().hide();
		}
	}
	window.onhashchange = locationHashChanged;

*/


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
		$('li.browse').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        		$('div.browse').load('../classes/browse.php').show().siblings().hide();
		});
		$('a.docview').click(function(){
	        $(this).addClass('active').removeClass('disable');
	        	$(this).siblings().removeClass('active').addClass('disable');
	        		$('div.docview').load('../classes/docview.php').show().siblings().hide();
		});
		//end nav tabs

		
	}); // end func








		//alert(window.location.hash);

	

}); // end class




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

