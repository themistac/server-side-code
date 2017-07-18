<?php
$connection = mysql_connect ("localhost", "******", "******");
$db= mysql_select_db("******",$connection);
foreach ($_POST[sortlist] as $varname => $varvalue) {
	$sql = "update kkwinch_content set ordering = ".mysql_real_escape_string($varname)." where id = ".mysql_real_escape_string($varvalue);
	$result = mysql_query($sql) or die(mysql_error());
}
echo "You just updated it on ".date("Y-m-d H:i:s");
?>
