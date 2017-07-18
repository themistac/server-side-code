
<div id="usercontainer">

<div style="float:left;"><a href="/" target="_blank">Talk Design &amp; Print website</a> 
<?php
if(isset($action)) {
echo "| <a href=\"/". $id. "/preview/\" target=\"_blank\">Preview this page</a>";
}
?> | <a href="../users/password.php">Change Password</a></div>

<div style="float:right;">Welcome <strong><?php echo $_SESSION['nametoshow'];?></strong> | <a href="../login/logout.php">Logout</a></div>

<div class="clear"><!-- clear float --></div>

</div>
