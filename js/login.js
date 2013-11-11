$(function() {
	//fade in failure message on anything failed
	$('div.alert-danger ').hide().fadeIn(700);
	$('<span class="alert"><i class="fa fa-times"></i></span>').appendTo('div.alert-danger');
	$('span.alert').click(function() {
		$(this).parent('div.alert').fadeOut('slow');
	});
	//fade in success message on registration
	$('div.alert-success ').hide().fadeIn(700);
	$('<span class="alert"><i class="fa fa-check"></i></span>').appendTo('div.alert-success ');
	$('span.alert').click(function() {
		$(this).parent('div.alert').fadeOut('slow');
	});


});


$(document).ready(function(){
	//initial things hidden
	$("form.form-verticle").hide();
	$("button.btn-danger").hide();
	
	//what button clicks will do
		$('button.slide').click(function()
		{
			$("form.form-horizontal").slideToggle(0,"linear",function(){ });
			$("form.form-verticle").slideToggle(0,"linear",function(){ });
			$("button.login").slideToggle(0,"linear",function(){ });
			$("button.slide").slideToggle(0,"linear",function(){ });
			$("button.btn-danger").slideToggle(0,"linear",function(){ });
  		});

		$('button.btn-danger').click(function()
		{
		window.location = " ";
  		});




		
		


});

