<?php
include("../includes/common.php");
include("../includes/config.php");
include("../includes/opendb.php");

if (strlen($p)<=0) { $p=1; }

// get parent level
$query_level1 = "SELECT title, parent_id, level, full_text, banner_image_url FROM kkwinch_content WHERE id=$p";
$result_level1  = mysql_query($query_level1) or die('Error : ' . mysql_error());
$row_level1 = mysql_fetch_array($result_level1);
$pagetitle = $row_level1['title'];
$parent = $row_level1['parent_id'];
$level = $row_level1['level'];
$content = $row_level1['full_text'];
$banner_image = $row_level1['banner_image'];

switch ($level) {
	case 1:
	$level1_to_hilight = $p;
	break;
	case 2:
	$level1_to_hilight = $parent;
	$level2_to_hilight = $p;
	break;
	case 3:
	$query_level3 = "SELECT title, parent_id, level FROM kkwinch_content WHERE id=$parent";
	$result_level3  = mysql_query($query_level3) or die('Error : ' . mysql_error());
	$row_level3 = mysql_fetch_array($result_level3);
	$level2_to_hilight = $parent;
	$parent_new=$row_level3['parent_id'];
	$parent=$parent_new;
	$level1_to_hilight = $parent_new;
	break;
}

//$contact_email = $kkemailquoteto;
$contact_email = 'marcus@talkdesignandprint.com';

$subject = "Quote request from Talk Design & Print website";
$name = stripslashes($_POST['txtName']);
$email = stripslashes($_POST['txtEmail']);
$telephone = stripslashes($_POST['txtTelephone']);
$query = stripslashes($_POST['txtQuery']);
$package = stripslashes($_POST['selPackage']);

$message = "Here are the results of the form:\n\n" .
			  $message .  "Name: " . $name . "\n" .
			  $message .  "Email: " . $email . "\n" .
			  $message .  "Telephone: " . $telephone . "\n" .
			  $message .  "Message: " . $query . "\n\n" .
  			  $message .  "==========\n\n" .
 			  $message .  "Copyright " . date("Y") . " Talk Design & Print";

?>

<?php include("../includes/doctype.php"); ?>
<title>Quote Request - Talk Design & Print</title>
<?php include("../includes/meta.php"); ?>
<?php include("../includes/css.php"); ?>
</head>

<body>

<ul class="hidden">
<li><a href="#content">Skip to content</a></li>
</ul>

<div id="pagewrapper">

<?php include("../includes/header.php"); ?>

<div class="clear"><!-- clear float --></div>

<div id="container">

<?php include("../includes/col-left.php"); ?>

<div id="col-main">

<div id="col-mid">

<div id="col-mid-bot">

<?php
if($p<>1) :
echo "<p id=\"breadcrumb\">";
get_crumbs($p, "0", $p);
echo "</p>";
echo "<h2>$pagetitle</h2>";
endif; ?>


<div id="left">

<h1>Quote Request</h1>


<div class="formboxtop">
<div class="formboxbottom">

<?php

if (!isset($_POST['Send'])) {
?>

<p style="padding:10px; background-color:#ccc;">Please fill in the quick form below and we'll get in touch as soon as we can.</p>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<fieldset>
<legend>Step 1</legend>

<p style="float:left; width:140px;"><label for="txtName">Your name:</label></p>
<p><input name="txtName" type="text" class="field" style="width:342px;" title="Enter your name" value="<?php echo $name ?>" /></p>
<div class="clear"><!-- clear float --></div>

<p style="float:left; width:140px;"><label for="txtEmail">Email address:</label></p>
<p><input name="txtEmail" type="text" class="field" style="width:342px;" title="Enter your email address" value="<?php echo $email ?>" /></p>
<div class="clear"><!-- clear float --></div>

<p style="float:left; width:140px;"><label for="txtTelephone">Telephone number:</label></p>
<p><input name="txtTelephone" type="text" class="field" style="width:342px;" title="Enter your telephone number" value="<?php echo $telephone ?>" /></p>
<div class="clear"><!-- clear float --></div>

<p><label for="txtQuery">Your message or what you would like us to quote on:</label></p>
<p><textarea name="txtQuery" cols="50" title="Enter your query" rows="10" style="width:482px"><?php echo $query ?></textarea></p>

<div class="clear"><!-- clear float --></div>

<p style="padding:20px 0 0 0; margin:0;"><input name="Send" type="submit" value="Send" style="background-color:#666; color:#fff; padding:10px; font-size:14px; cursor:pointer;" /></p>
</fieldset>
</form>

<?php

}

elseif (empty($name) || empty($email) || empty($query)) {
echo "<div style=\"padding:10px; background-color:#ccc; margin-bottom:10px;\"><h3 style=\"margin:0 0 10px 0; padding:0;background:url(/images/common/delete-24x24.png) no-repeat left top;height:24px; line-height:24px; padding-left:30px; color:#cc0000;\">Sorry, your form has not been sent.</h3><p style=\"margin-bottom:0;\">Please complete all parts of the form before sending.</p></div>";
?>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<fieldset>
<legend>Step 1</legend>

<p style="float:left; width:140px;">Your name:</p>
<p><input name="txtName" type="text" class="field" style="width:342px;" title="Enter your name" value="<?php echo $name ?>" /></p>
<div class="clear"><!-- clear float --></div>

<p style="float:left; width:140px;">Email address:</p>
<p><input name="txtEmail" type="text" class="field" style="width:342px;" title="Enter your email address" value="<?php echo $email ?>" /></p>
<div class="clear"><!-- clear float --></div>

<p style="float:left; width:140px;">Telephone number:</p>
<p><input name="txtTelephone" type="text" class="field" style="width:342px;" title="Enter your telephone number" value="<?php echo $telephone ?>" /></p>
<div class="clear"><!-- clear float --></div>

<p>Your message or what you would like us to quote on:</p>
<p><textarea cols="50" title="Enter your query" rows="10" name="txtQuery" style="width:482px"><?php echo $query ?></textarea></p>

<div class="clear"><!-- clear float --></div>

<p style="padding:20px 0 0 0; margin:0;"><input name="Send" type="submit" value="Send" style="background-color:#666; color:#fff; padding:10px; font-size:14px; cursor:pointer;" /></p>
</fieldset>
</form>

<?php
}

else {

// Stop the form being used from an external URL
// Get the referring URL

$referer = $_SERVER['HTTP_REFERER'];

// Get the URL of this page

$this_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];

// If the referring URL and the URL of this page don't match then

// display a message and don't send the email.

if ($referer != $this_url) {
echo "You do not have permission to use this script from another URL.";
exit;
}

// The URLs matched so send the email
mail($contact_email, $subject, $message, "From: $name <$email>");

// Display the thankyou message
echo "<h3 style=\"background:url(/images/common/accept-24x24.png) no-repeat left top; padding-left:30px; line-height:24px; height:24px;\">Thank you $name, your form has been sent.</h3>";
echo "<p>We will be in touch with you shortly. For your record here is a copy of the form you sent.</p>";
echo "<div style=\"padding:10px; background-color:#ccc;\">";
echo "<p style=\"border-bottom:1px solid #ccc; padding-bottom:5px;\">Your name:<br />$name</p>";
echo "<p style=\"border-bottom:1px solid #ccc; padding-bottom:5px;\">Email address:<br />$email</p>";
echo "<p style=\"border-bottom:1px solid #ccc; padding-bottom:5px;\">Telephone number:<br />$telephone</p>";
echo "<p style=\"padding-bottom:5px;\">Your message or what you would like us to quote on:<br />$query</p>";
echo "</div>";
}
?>

</div>
</div>

<!-- col --></div>
<div class="clear"><!-- clear float --></div>
</div>
</div>
</div>

<?php include("../includes/col-right.php"); ?>

<div class="clear"><!-- clear float --></div>

<!-- container --></div>

<?php include("../includes/service-list.php"); ?>
<?php include("../includes/footer.php"); ?>

<!-- pagewrapper --></div>

<?php include("../includes/analytics.php"); ?>

</body>
</html>

<?php include("../includes/closedb.php"); ?>
