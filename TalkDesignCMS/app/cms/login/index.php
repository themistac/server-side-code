<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="eng">
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" media="screen" href="../common/screen.css" />

<script language="javascript" type="text/javascript">
<!--

function validateform() {

	if (document.frm["myusername"].value == "")
	{
		alert("Please enter your username.");
		document.frm["myusername"].focus()
		return false;
	}
	
	if (document.frm["mypassword"].value == "")
	{
		alert("Please enter your password.");
		document.frm["mypassword"].focus()
		return false;
	}
	
   return retValue;

}

function focusform() {
document.frm["myusername"].focus()
}

//-->
</script>

</head>

<body onload="focusform();">

<div id="wrapper">

<div style="margin:50px auto; width:410px;">

<img src="../common/kdgcms.png" />

<?php

if(isset($_POST['login'])) {

	include '../common/config.php';
	$tbl_name="kkwinch_members"; // Table name

	// Connect to server and select databse.
	mysql_connect("$dbhost", "$dbuser", "$dbpass")or die("cannot connect");
	mysql_select_db("$dbname")or die("cannot select DB");

	// username and password sent from form
	$myusername=$_POST['myusername'];
	$password=$_POST['mypassword'];
//	$mypassword = $password;
	$mypassword = md5 ($password . $salt);

	// To protect MySQL injection
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);

	$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$result=mysql_query($sql);
	$myuserlevel = mysql_result($result,0,"userlevel");
	$nametoshow = mysql_result($result,0,"fullname");

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row

	if($count==1) {
	// Register $myusername, $mypassword and redirect to home
	session_register("myusername");
	session_register("mypassword");
	$_SESSION['myusername'] = $myusername;
	$_SESSION['myuserlevel'] = $myuserlevel;
	$_SESSION['nametoshow'] = $nametoshow;
	echo '<script language="javascript" type="text/javascript">';
	echo 'location.replace("../home/");';
	echo '</script>';
//	header("location:../home/");
	}
	
else {

echo "<p id=\"infofade\" class=\"errorinfo\" style=\"border-bottom:none; margin-bottom:0; padding-bottom:10px;\"><script>waittofade();</script>Wrong Username or Password. Please try again.</p>";
//echo $mypassword;
}

}

?>

<form name="frm" method="post" action="index.php">
<input type="hidden" name="login" value="1">

<p style="color:#fff; margin-top:20px">Username:</p>
<p><input name="myusername" type="text" id="myusername" class="box" /></p>

<p style="color:#fff">Password:</p>
<p><input name="mypassword" type="password" class="box" id="mypassword" /></p>

<div style="padding-top:20px;"><input type="submit" name="submit" value="Login" style="font-size:18px;" onclick="return validateform();" />
</div>

</form>
</div>
</div>
</body>
</html>