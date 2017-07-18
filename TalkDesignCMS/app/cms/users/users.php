<?php
include '../common/protect.php';
include '../common/config.php';
include '../common/opendb.php';

$tbl_name="kkwinch_members"; // Table name

$query="SELECT * FROM $tbl_name WHERE username <> 'admin'";
$result = mysql_query($query) or die('Error : ' . mysql_error());

if(isset($_GET['del'])) {
// remove the article from the database
$query = "DELETE FROM $tbl_name WHERE id = '{$_GET['del']}'";
mysql_query($query) or die('Error : ' . mysql_error());

// redirect to current page so when the user refresh this page
// after deleting an article we won't go back to this code block
header('Location:users.php');
exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="eng">
<head>
<title>Update User Passwords</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="Stylesheet" href="../common/screen.css" type="text/css">
<script type="text/javascript" src="../common/functions.js"></script>

<script language="javascript">
function delArticle(id, title)
{
	if (confirm("Are you sure you want to delete '" + title + "'?"))
	{
		window.location.href = '<?php echo $_SERVER['REQUEST_URI']; ?>?del=' + id;
	}
}
</script>

</head>
<body>
<div id="wrapper">
<div id="contentwrapper">
<?php include '../common/header.php'; ?>
<div id="breadcrumb">
<p><a href="../home/">Admin home</a> > Update User Passwords</p>
</div>
<div id="maincontent">

<h2>Update User Passwords</h2>

<?php

if(isset($_POST['update'])) {

//Get new password
$newpass1 = $_POST['newpassword1'];
$newpass2 = $_POST['newpassword2'];

if ($newpass1 == ""):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>You must enter a new password, please try again.</p>";
		elseif ($newpass2 == ""):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>You must enter your new password twice, please try again.</p>";
		elseif ($newpass1 <> $newpass2):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>Your new password fields did not match, please try again.</p>";
		elseif (strlen($newpass1) < 6):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>Your new password must be at least 6 characters long, please try again.</p>";
		else:
		// Update record with password
		$fullname = $_POST['fullname'];
		$userid = $_POST['id'];
		$hash = md5 ($newpass1 . $salt);
		$query1 = "UPDATE $tbl_name SET password = '$hash' WHERE id = '$userid'";
		mysql_query($query1) or die('Error : ' . mysql_error());
		echo "<p id=\"infofade\" class=\"updateinfo\"><script>waittofade();</script>The password for <strong>$fullname</strong> has been changed.</p>";
endif;
}

if(isset($_POST['add'])) {

//Get new password
$newpass1 = $_POST['newpassword1'];
$newpass2 = $_POST['newpassword2'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$userlevel = $_POST['userlevel'];

if ($newpass1 == ""):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>You must enter a new password, please try again.</p>";
		elseif ($newpass2 == ""):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>You must enter your new password twice, please try again.</p>";
		elseif ($newpass1 <> $newpass2):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>Your new password fields did not match, please try again.</p>";
		elseif (strlen($newpass1) < 6):
		echo "<p id=\"infofade\" class=\"errorinfo\"><script>waittofade();</script>Your new password must be at least 6 characters long, please try again.</p>";
		else:
		// add new user
		$hash = md5 ($newpass1 . $salt);
		$query = "INSERT INTO $tbl_name (fullname, username, userlevel, password) VALUES ('$fullname', '$username', '$userlevel', '$hash')";
		mysql_query($query) or die('Error ,query failed');
		echo '<script language="javascript" type="text/javascript">';
		echo 'location.replace("users.php");';
		echo '</script>';

/*		echo "<p id=\"infofade\" class=\"updateinfo\"><script>waittofade();</script>User <strong>$fullname</strong> has been added.</p>"; */
endif;
}

?>



<div class="box-top">
<div class="box-bottom">

<div class="textbox1">
<div class="col" style="width:130px;"><strong>Full Name</strong></div>
<div class="col" style="width:90px;"><strong>Username</strong></div>
<div class="col" style="width:90px;"><strong>User level</strong></div>
<div class="col" style="width:260px;"><strong>Password (enter twice to confirm)</strong></div>
<div class="col" style="width:200px;"><strong>Action</strong></div>
<div class="clear"><!-- clear float --></div>
</div>
<?php
while(list($id, $username, $password, $userlevel, $fullname) = mysql_fetch_array($result, MYSQL_NUM)) {
?>
<form action="users.php" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="hidden" name="fullname" value="<?php echo $fullname; ?>" />
<div class="textbox1">
<div class="col" style="width:130px;"><?php echo $fullname; ?></div>
<div class="col" style="width:90px;"><?php echo $username; ?></div>
<div class="col" style="width:90px;"><?php echo $userlevel; ?></div>
<div class="col" style="width:260px;"><input name="newpassword1" type="password" value="" size="12" /> <input name="newpassword2" type="password" value="" size="12" /></div>
<div class="col" style="width:200px;"><input name="update" type="submit" class="savebutton" id="update" value="Update" />
<input name="delete" type="button" class="cancelbutton" id="delete" onclick="javascript:delArticle('<?php echo $id;?>', '<?php echo $fullname;?>');" value="Delete" />
</div>
<div class="clear"><!-- clear float --></div>
</div>
</form>
<?php
}
?>

<form action="users.php" method="post">
<div class="textbox1 removebottomborder">
<div class="col" style="width:130px;"><input name="fullname" type="text" value="" size="15" /></div>
<div class="col" style="width:90px;"><input name="username" type="text" value="" size="8" /></div>
<div class="col" style="width:90px;"><select name="userlevel">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select></div>
<div class="col" style="width:260px;"><input name="newpassword1" type="password" value="" size="12" /> <input name="newpassword2" type="password" value="" size="12" /></div>
<div class="col" style="width:200px;"><input name="add" type="submit" class="addbutton" id="add" value="Add" />
</div>
<div class="clear"><!-- clear float --></div>
</div>
</form>

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