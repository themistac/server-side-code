<div class="formboxtop" style="padding:20px; background-color:#eee;">
<div class="formboxbottom">

<div class="message"><div id="alert"></div></div>

<p style="padding:10px; background-color:#ddd;">Please fill in the quick form below and we'll get in touch as soon as we can.</p>

<form action="/includes/sendmail.php" method="post" id="contactForm">
<input type="hidden" name="pagetitle" value="<?php $pagetitle ?>" />
<fieldset>

<legend>Step 1</legend>

<p style="float:left; width:140px;"><label for="txtName">Your name:</label></p>
<p><input name="name" id="name" type="text" class="field" style="width:342px;" title="Enter your name" value="" /></p>
<div class="clear"><!-- clear float --></div>

<p style="float:left; width:140px;"><label for="txtEmail">Email address:</label></p>
<p><input name="email" id="email" type="text" class="field" style="width:342px;" title="Enter your email address" value="" /></p>
<div class="clear"><!-- clear float --></div>

<p style="float:left; width:140px;"><label for="txtTelephone">Telephone number:</label></p>
<p><input name="tele" id="tele" type="text" class="field" style="width:342px;" title="Enter your telephone number" value="" /></p>
<div class="clear"><!-- clear float --></div>

<p><label for="txtQuery">Your message or what you would like us to quote on:</label></p>
<p><textarea name="message" cols="50" title="Enter your message" rows="10" style="width:482px"></textarea></p>

<div class="clear"><!-- clear float --></div>

<p style="padding:20px 0 0 0; margin:0;"><input name="Send" type="submit" value="Send" style="background-color:#666; color:#fff; padding:10px; font-size:14px; cursor:pointer;" /></p>
</fieldset>
</form>


</div>
</div>
