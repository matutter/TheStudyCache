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



$(document).ready(function() {

	$('#register').hide();
	$('#show-reg-form, #show-login-form').click(function() { switch_these(); });

	function switch_these() {
		$('#login').slideToggle();
		$('#register').slideToggle();
	}

	$('button#register').click(function() { Register() } );
	$('#register').on('keyup', function(e) {
    	var code = (e.keyCode ? e.keyCode : e.which);
    	if (code == 13)
    		Register();
	});
	function Register() {
		$.ajax({
		    type: "POST",
		    dataType: "json",
		    url: "../classes/membership.php",
		    data: {register:$('form#register').serialize()},
		    success: function(response){
		    	if( response['bool'] == "true" ) {
		    		$('.alert').hide();
		    		$('<div class="alert alert-success">'+response['message']+'</div>').clone().appendTo('span#login-response').fadeOut(8000).siblings().hide();
		    		switch_these();
		    		$('#register,#show-reg-form').addClass('disabled')
		    	}
		    	else
		    		$('<div class="alert alert-danger">'+response['message']+'</div>').clone().appendTo('span#register-response').fadeOut(2800).siblings().hide();
		    }
		});
  	}

	$('button#login').click(function() { Login(); });
	$('#login').on('keyup', function(e) {
    	var code = (e.keyCode ? e.keyCode : e.which);
    	if (code == 13)
    		Login();
	});
	function Login() {
		$.ajax({
		    type: "POST",
		    dataType: "json",
		    url: "../classes/membership.php",
		    data: {login:$('form#login').serialize().replace(/[^a-zA-Z0-9_-]/g,'*')},
		    success: function(response) { 
		    	if( response['message'] == 'Login Success.' ) {
		    		$('span#login-response').append('<div class="alert alert-success">'+response['message']+'</div>').fadeIn('slow');
		    		document.cookie['status'] = response['validate'];
		    		window.location.replace("index.php");
		    	}
		   		else
		  			$('<div class="alert alert-danger">'+response['message']+'</div>').clone().appendTo('span#login-response').fadeOut(2800).siblings().hide();
			}
		});
 	}
});