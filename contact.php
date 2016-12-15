<?php
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

//If the form is submitted
if(isset($_POST['submitted'])) {
	
	// require a name from user
	if(trim($_POST['Name']) === '') {
		$nameError =  'Forgot your name!'; 
		$hasError = true;
	} else {
		$name = trim($_POST['Name']);
	}
	
	// need valid email
	if(trim($_POST['Email']) === '')  {
		$emailError = 'Forgot to enter in your e-mail address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['Email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['Email']);
	}

	$telephone = trim($_POST['Telephone']);
		
	// we need at least some content
	if(trim($_POST['Message']) === '') {
		$messageError = 'You forgot to enter a message!';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['Message']));
		} else {
			$message = trim($_POST['Message']);
		}
	}
		
	// upon no failure errors let's email now!
	if(!isset($hasError)) {
		
		$emailTo = 'minhthinhnguyen@gmail.com,arora.anurag@live.com';
		$subject = 'Inquiry from '.$name;
		$sendCopy = trim($_POST['sendCopy']);
		$body = "Name: $name \n\nEmail: $email \n\nTelephone: $telephone \n\nMessage: $message";
		$headers = 'From: ' .' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);

    		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: Better Life Vietnam <info@betterlifevietnam.org>' . "\r\n";
		$replymessage="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
			<html xmlns='http://www.w3.org/1999/xhtml'>
			<head>
			<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
			<title>Better Life Vietnam</title>
			</head>
			<body>
			<table width='700' border='0' align='center'>
			  <tr>
			    <td height='111' align='left' valign='bottom'><a border='0' href='http://www.betterlifevietnam.org/'><img border='0' src='http://www.mavencrafts.com/images/Better-Life-Vietnam.png' alt='Better Life Vietnam' /></a></td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			  </tr>
			  <tr>
			    <td height='73' align='left' valign='top' style='font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#808080; line-height: 150%;'>Dear ".$name.",<br /><br />
			    Thank you for your interest in Better Life Vietnam. We have received your message, we will contact you shortly.<br /><br />
			    Best Regards,<br /><br />
			    <span style='color:#7FBBD7'>Better Life Vietnam</span><br />
			    E-mail: <a style='font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#83b5b9;' href='mailto:info@betterlifevietnam.org'>info@BetterLifeVietnam.org</a><br />
			    Website: <a style='font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#83b5b9;' href='http://www.betterlifevietnam.org'>www.BetterLifeVietnam.org</a></td>
			  </tr>
			</table>
			</body>
			</html>";
		mail($email,"Thank you for your message !",$replymessage,$headers);

        
        // set our boolean completion value to TRUE
		$emailSent = true;
	}
}
$pagehead="Contact";
$bodyBG=" class='InsideBodyBG'";
$ExtraHeader="<link rel='stylesheet' href='css/contact.css' />
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/contact.js'></script>";
include_once("lib/header.php");
?>
<div class="BodyBox">
	<h2 class="Pagehead">Contact</h2>
	<div class="Subcontent2">
	    <div class="inquiryform" id="inq">
	        <?php if(isset($emailSent) && $emailSent == true) { ?>
                <p class="info">Your email was sent.</p>
	        <?php } else { ?>
		<?php if(isset($hasError) || isset($captchaError) ) { ?>
                <p class="alert">Error submitting the form</p>
                <?php } ?>
		<form name="contactform" id="contact-form" method="post" action="contact.php">
		<div id="wrapping">
		    <div id="textboxes">
			<?php if($nameError != '') { ?>
				<span class="error"><?php echo $nameError;?></span>
			<?php } ?>
		        <input type="text" name="Name" id="name" placeholder="Your name" autocomplete="off" tabindex="1" class="txtinput requiredField" value="<?php if(isset($_POST['Name'])) echo $_POST['Name'];?>">
			<?php if($emailError != '') { ?>
				<span class="error"><?php echo $emailError;?></span>
			<?php } ?>
		        <input type="email" name="Email" id="Email" placeholder="Your e-mail address" autocomplete="off" tabindex="2" class="txtinput requiredField" value="<?php if(isset($_POST['Email'])) echo $_POST['Email'];?>">
		        <input type="tel" name="Telephone" id="telephone" placeholder="Phone number (optional)" tabindex="3" class="txtinput" value="<?php if(isset($_POST['Telephone'])) echo $_POST['Telephone'];?>">
		    </div>
		    <div id="textAr">
			<?php if($messageError != '') { ?>
				<span class="error"><?php echo $messageError;?></span>
			<?php } ?>
		        <textarea name="Message" id="message" placeholder="Write your message" tabindex="4" class="txtblock requiredField"><?php if(isset($_POST['Message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['Message']); } else { echo $_POST['Message']; } } ?></textarea>
		    </div>
		    <div id="buttons">
			<input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="5" value="Send">
			<input type="hidden" name="submitted" id="submitted" value="true" />
		    </div>
		    <br style="clear: left;" />
		</form>
		</div>
	        <? } ?>
	    </div>
	    <div class="address" id="add">
	    	<h3>Write us at:</h3>
	    	<a href="mailto:betterlifevietnam@gmail.com">toursforbooks@betterlifevietnam.org</a>
	    </div>
	</div>
<?
include_once("lib/footer.php");
?>