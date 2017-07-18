<div id="col-right">
<?php
switch ($p) {
case 1:
$query_colright = " SELECT full_text, template_category_id FROM kkwinch_content WHERE template_category_id = 5 AND published = 1 ORDER BY ordering ASC";
$result_colright = mysql_query($query_colright) or die('Error, query failed');

while($row_colright = mysql_fetch_array($result_colright)) {
$colright_text = $row_colright['full_text'];
echo $colright_text;
}
break;

default:
$query_colright = " SELECT full_text, template_category_id FROM kkwinch_content WHERE template_category_id = 4 AND published = 1 ORDER BY ordering ASC";
$result_colright = mysql_query($query_colright) or die('Error, query failed');

while($row_colright = mysql_fetch_array($result_colright)) {
$colright_text = $row_colright['full_text'];
echo $colright_text;
}
break;
}

//include("new-products.php");

?>
<!-- col-right --></div>