<?php
$query_newproduct = " SELECT id, title, start_date, thumb_image FROM kkwinch_content WHERE published = 1 AND new_product = 1 ORDER BY start_date DESC" .
         " LIMIT 0, 5";
$result_newproduct = mysql_query($query_newproduct) or die('Error, query failed');

echo '<div class="box">';
echo '<h2>New Products</h2>';

while($row = mysql_fetch_array($result_newproduct)) {
$newproduct_id = $row['id'];
$newproduct_title = $row['title'];
$newproduct_date = $row['start_date'];
$thumb_image = $row['thumb_image'];
$newproduct_keywords = show_keywords($newproduct_title);

echo '<p style="clear:both;"><a href="/'.$newproduct_id.'/'.$newproduct_keywords.'/"><img src="'.$thumb_image.'" style="background-color:#fff; padding:2px; width:20px; margin: 0 2px 5px 0; float:left;" />'.$newproduct_title.'</a></p>';
}
echo '<div class="clear"><!-- clear float --></div>';
echo '</div>';
?>