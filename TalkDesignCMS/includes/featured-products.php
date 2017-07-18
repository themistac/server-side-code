<?php
$query_newproduct = " SELECT id, title, start_date, thumb_image FROM kkwinch_content WHERE published = 1 AND new_product = 1 ORDER BY start_date DESC" .
         " LIMIT 0, 6";
$result_newproduct = mysql_query($query_newproduct) or die('Error, query failed');

echo "<div id=\"new-product\">\n";
echo "<h3>Featured <strong>products</strong> &amp; <strong>services</strong></h3>\n";

while($row = mysql_fetch_array($result_newproduct)) {
$newproduct_id = $row['id'];
$newproduct_title = $row['title'];
$newproduct_date = $row['start_date'];
$thumb_image = $row['thumb_image'];
$newproduct_keywords = show_keywords($newproduct_title);

echo "<div class=\"col-product-frame\">\n";
echo "<div class=\"col-product-image\">\n";
echo "<a href=\"/".$newproduct_id."/".$newproduct_keywords."/\" title=\"".$newproduct_title."\"><img src=\"".$thumb_image."\" alt=\"".$newproduct_title."\" /></a>\n";
echo "</div>";
echo "<p>".$newproduct_title."</p>";
//echo "<a href=\"/".$newproduct_id."/".$newproduct_keywords."/\"><img src=\"".$thumb_image."\" /><br />".$newproduct_title."</a>\n";
echo "</div>";

}
echo '<div class="clear"><!-- clear float --></div>';
echo '</div>';
echo '<div class="clear"><!-- clear float --></div>';
?>