<?php
$connection = mysql_connect ("localhost", "talkde39_talkdbu", "Lwa0XmX+yXq;");
$db= mysql_select_db("talkde39_talk",$connection) or die("no db found");
foreach ($_POST[sortlist] as $varname => $varvalue) {
	$sql = "update kkwinch_content set ordering = ".mysql_real_escape_string($varname)." where id = ".mysql_real_escape_string($varvalue);
	$result = mysql_query($sql) or die(mysql_error());
}
echo "<script>waittofade();</script>Order updated.";
?>
