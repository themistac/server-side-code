<?php
include '../common/protect.php';
include '../common/config.php';
include '../common/opendb.php';

$currentuser = $_SESSION['myusername'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="eng">
<head>
<title>Change Password</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="Stylesheet" href="../common/screen.css" type="text/css">
<script type="text/javascript" src="../common/functions.js"></script>

</head>
<body>
<div id="wrapper">
<div id="contentwrapper">
<?php include '../common/header.php'; ?>
<div id="breadcrumb">
<p><a href="../home/">Admin home</a> > Change Password</p>
</div>
<div id="maincontent">

<h2>Change Password</h2>

<?php

if(isset($_POST['change'])) {

$tbl_name = "kkwinch_members"; // Table name
$currentuser = $_SESSION['myusername'];

// get current password from form
$currentpw = $_POST['currentpassword'];
$currentpassword = md5 ($currentpw . $salt);

//Get new password
$newpass1 = $_POST['newpass1'];
$newpass2 = $_POST['newpass2'];

if ($currentpw == ""):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>You must enter your current password, please try again.</p>";
		elseif ($newpass1 == ""):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>You must enter a new password, please try again.</p>";
		elseif ($newpass2 == ""):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>You must enter your new password twice, please try again.</p>";
		elseif ($newpass1 <> $newpass2):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>Your new password fields did not match, please try again.</p>";
		elseif (strlen($newpass1) < 6):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>Your new password must be at least 6 characters long, please try again.</p>";
		else:
		// Verify current password
		$query = "SELECT password FROM $tbl_name WHERE username = '$currentuser'";
		mysql_query($query) or die('Error : ' . mysql_error());
		$result = mysql_query($query);
		$actualpassword = mysql_result($result,0,"password");
		if ($currentpassword <> $actualpassword):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>Your current password is incorrect, please try again.</p>";
		else:
		// Update record with password
		$hash = md5 ($newpass1 . $salt);
		$query1 = "UPDATE $tbl_name SET password = '$hash' WHERE username = '$currentuser'";
		mysql_query($query1) or die('Error : ' . mysql_error());
		echo "<p id=\"infofade\" class=\"updateinfo\"><script>waittofade();</script>Your password has been changed.</p>";
		endif;
endif;
}
?>

<form action="password.php" method="post">

<div class="box-top">
<div class="box-bottom">

<p style="padding-top:0; margin-top:0;">You must enter your current password, then your new password twice in the spaces provided and hit 'Save' below.</p>

<div class="textbox1">
<label class="col" style="width:150px;">Username:</label>
<div class="col"><strong><?php echo $currentuser; ?></strong></div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<label class="col" style="width:150px;">Current Password:</label>
<div class="col"><input name="currentpassword" type="password" value="" size=15 /></div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<label class="col" style="width:150px;">New Password:</label>
<div class="col"><input name="newpass1" type="password" value="" size=15 /></div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1 removebottomborder">
<label class="col" style="width:150px;">New Password:</label>
<div class="col"><input name="newpass2" type="password" value="" size=15 /></div>
<div class="clear"><!-- clear float --></div>
</div>


</div>
</div>

<div class="actionbox-top">
<div class="actionbox-bottom">
<input name="change" type="submit" class="savebutton" value="Save" />
<input type="button" value="Cancel" class="cancelbutton" onclick="javascript:cancel('../home/');" />
</div>
</div>
</form>

</div>
<?php include '../common/footer.php'; ?>
</div>
</div>
</body>
</html>

<?php include '../common/closedb.php'; ?>