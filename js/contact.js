	<!--//--><![CDATA[//><!--
	$(document).ready(function() {
		$('form#contact-form').submit(function() {
			$('form#contact-form .error').remove();
			var hasError = false;
			$('.requiredField').each(function() {
				if($.trim($(this).val()) == '') {
					var Fname = $(this).attr('name');
					$(this).before('<span class="error">You forgot to enter '+Fname+'</span>');
					$(this).addClass('inputError');
					hasError = true;
				} else if($(this).hasClass('email')) {
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if(!emailReg.test($.trim($(this).val()))) {
						$(this).before('<span class="error">Sorry! You\'ve entered an invalid email address</span>');
						$(this).addClass('inputError');
						hasError = true;
					}
				}
			});
			if(!hasError) {
				var formInput = $(this).serialize();
				$('#submitbtn').hide();
				$('#submitted').after('<span id="loader"><img border="0" src="images/loader.gif" /></span>');
				$.post($(this).attr('action'),formInput, function(data){
					$('form#contact-form').slideUp("fast", function() {
						$('#loader').hide();
						$('#add').hide();
						$(this).before('<p class="confirmation"><strong>Thank you,</strong> your message has been delivered.</p><br /><br />');
					});
				});
			}
			
			return false;	
		});
	});
	//-->!]]>