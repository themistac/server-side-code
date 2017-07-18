<?php
/*

This script was created by Bryan Helmig at midmodesign.com. It is licensed under http://creativecommons.org/licenses/by-nc-sa/3.0/us/. 
1)   A quick primer: place this on your server. Create a form like below:
--------------------------------------------------------------------------------------------------------
<form action="sendmail.php" method="post" id="contactForm">
	<p>Name:</p> <input type="text" name="name" value="" id="name" />
	<p>Email:</p> <input type="text" name="email" value="" id="email" />
	<p>Telephone:</p> <input type="text" name="tele" value="" id="tele" />
	<span style="display:none;"><p>Honeypot:</p> <input type="text" name="last" value="" id="last" /></span>
	<p>Message:</p> <textarea rows="5" name="message"></textarea>
	<input type="submit" value="Send Message" />
</form
--------------------------------------------------------------------------------------------------------
2)   This will work fine for a standard form. If you want ajax power, add this div above or below and hide it with css.
--------------------------------------------------------------------------------------------------------
<div class="message"><div id="alert"></div></div>
--------------------------------------------------------------------------------------------------------
3)   And add this to the head: Also download jquery-latest.pack.js and jquery.form.js and point to those appropriately.
--------------------------------------------------------------------------------------------------------
<script type="text/javascript" src="jquery-latest.pack.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
var options = { 
target:        '#alert',
beforeSubmit:  showRequest,
success:       showResponse
}; 
$('#contactForm').ajaxForm(options); 
}); 
function showRequest(formData, jqForm, options) { 
var queryString = $.param(formData); 
return true; 
} 
function showResponse(responseText, statusText)  {  
} 
$.fn.clearForm = function() {
  return this.each(function() {
	var type = this.type, tag = this.tagName.toLowerCase();
	if (tag == 'form')
	  return $(':input',this).clearForm();
	if (type == 'text' || type == 'password' || tag == 'textarea')
	  this.value = '';
	else if (type == 'checkbox' || type == 'radio')
	  this.checked = false;
	else if (tag == 'select')
	  this.selectedIndex = -1;
  });
};
</script>
--------------------------------------------------------------------------------------------------------

Boom. There it is. 
*/

//        Who you want to recieve the emails from the form. (Hint: generally you.)
//$sendto = 'nicky@kkwinch.com, alistair@kkwinch.com';
$sendto = 'marcus@kkwinch.com';

//        The subject you'll see in your inbox
$subject = 'Quote request from Kall Kwik Winchester website';

//        Message for the user when he/she doesn't fill in the form correctly.
$errormessage = '<h3 class="alert">Sorry, your message has not been sent. Please make sure you have...</h3>';

//        Message for the user when he/she fills in the form correctly.
$thanks = '<h3 class="accept">Thanks for the email. We will get back to you as soon as possible.</h3>';

//        Various messages displayed when the fields are empty.
$emptyname =  'Entered your name';
$emptyemail = 'Entered your email address';
$emptytele = 'Entered your telephone number';
$emptymessage = 'Entered a message';

//       Various messages displayed when the fields are incorrectly formatted.
$alertname =  'Entering your name using only the standard alphabet?';
$alertemail = 'Entering your email in this format: <i>name@example.com</i>?';
$alerttele = 'Entering your telephone number in this format: <i>555-555-5555</i>?';
$alertmessage = "Making sure you aren't using any parenthesis or other escaping characters in the message? Most URLS are fine though!";

// --------------------------- Thats it! don't mess with below unless you are really smart! ---------------------------------

//Setting used variables.
$alert = '';
$pass = 0;

// Sanitizing the data, kind of done via error messages first. Twice is better!  ;-)
function clean_var($variable) {
    $variable = strip_tags(stripslashes(trim(rtrim($variable))));
  return $variable;
}

//The first if for honeypot.
if ( empty($_REQUEST['last']) ) {

	// A bunch of if's for all the fields and the error messages.
if ( empty($_REQUEST['name']) ) {
	$pass = 1;
	$alert .= "<p>" . $emptyname . "</p>";
} elseif ( ereg( "[][{}()*+?.\\^$|]", $_REQUEST['name'] ) ) {
	$pass = 1;
	$alert .= "<p>" . $alertname . "</p>";
}
if ( empty($_REQUEST['email']) ) {
	$pass = 1;
	$alert .= "<p>" . $emptyemail . "</p>";
}

//elseif ( !eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $_REQUEST['email']) ) {
//	$pass = 1;
//	$alert .= "<p>" . $alertemail . "</p>";
//}
if ( empty($_REQUEST['message']) ) {
	$pass = 1;
	$alert .= "<p>" . $emptymessage . "</p>";
} elseif ( ereg( "[][{}()*+?\\^$|]", $_REQUEST['message'] ) ) {
	$pass = 1;
	$alert .= "<p>" . $alertmessage . "</p>";
}

	//If the user err'd, print the error messages.
	if ( $pass==1 ) {

		//This first line is for ajax/javascript, comment it or delete it if this isn't your cup o' tea.
	echo "<script>$(\".message\").hide(\"slow\").show(\"slow\"); </script>";
	echo $errormessage;
	echo $alert;

	// If the user didn't err and there is in fact a message, time to email it.
	} elseif (isset($_REQUEST['message'])) {
	    
		//Construct the message.
//		$message = "Here are the results of the form:\n\n";
//		$message .= "Sent from " . $_REQUEST['pagetitle'] . " page.\n\n";
//		$message .= "From: " . clean_var($_REQUEST['name']) . "\n";
//		$message .= "Email: " . clean_var($_REQUEST['email']) . "\n";
//		$message .= "Telephone: " . clean_var($_REQUEST['tele']) . "\n";
//		$message .= "Message: \n" . clean_var($_REQUEST['message']) . "\n\n";
//		$message .=  "==========\n\n";
//		$message .=  "Copyright " . date("Y") . " Kall Kwik Winchester";
//		$header = 'From:info@kkwinch.com';









// Send HTML mail

$messagehtml = "<img src=\"http://www.kkwinchester.com/images/common/logo.gif\">" .
$messagehtml . "<p>&nbsp;</p>\n" .
$messagehtml . "<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-bottom:5px solid #008fd0\">\n" .
$messagehtml . "<tr>\n".
$messagehtml . "<td>Page this was sent from:</td>\n" .
$messagehtml . "<td>" . $_REQUEST['pagetitle'] . "</td>\n" .
$messagehtml . "</tr>\n".

$messagehtml . "<tr>\n".
$messagehtml . "<td>Name:</td>\n" .
$messagehtml . "<td>" . clean_var($_REQUEST['name']) . "</td>\n" .
$messagehtml . "</tr>\n".

$messagehtml . "<tr>\n".
$messagehtml . "<td>Email:</td>\n" .
$messagehtml . "<td>" . clean_var($_REQUEST['email']) . "</td>\n" .
$messagehtml . "</tr>\n".

$messagehtml . "<tr>\n".
$messagehtml . "<td>Telephone:</td>\n" .
$messagehtml . "<td>" . clean_var($_REQUEST['tele']) . "</td>\n" .
$messagehtml . "</tr>\n".

$messagehtml . "<tr>\n".
$messagehtml . "<td>Message:</td>\n" .
$messagehtml . "<td>" . clean_var($_REQUEST['message']) . "</td>\n" .
$messagehtml . "</tr>\n".

$messagehtml . "</table>\n\n".


$messagehtml .  "<br><p>&copy; " . date("Y") . " Kall Kwik Winchester</p>";

// To send HTML mail, the Content-type header must be set
$header = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header .= 'From: info@kkwinch.com';













//Mail the message - for production
		mail($sendto, $subject, $messagehtml, $header);
//This is for javascript, 
		echo "<script>$(\".message\").hide(\"slow\").show(\"slow\").animate({opacity: 1.0}, 4000).hide(\"slow\"); $(':input').clearForm() </script>";
		echo $thanks;
		die();

//Echo the email message - for development
		echo "<br/><br/>" . $message;

	}
	
//If honeypot is filled, trigger the message that bot likely won't see.
} else {
	echo "<script>$(\".message\").hide(\"slow\").show(\"slow\"); </script>";
	echo $honeypot;
}
?>
