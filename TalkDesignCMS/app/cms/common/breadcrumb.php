<?php
/* ———————————————- */
/* ———— BEGIN PHP SNIPPET —————-*/
/* ———————————————- */
// $this_cat_id: the current category id number
// $flarn: just a counter, call it as 0 in your
// function call and forget about it
// $keep_cat_id: the cat id number again - so that
// it can decide whether to make a
// category a link at the top while you’re in the
// "product” page

function get_crumbs($this_cat_id, $flarn, $keep_cat_id) {

$link_to_page=$_SERVER['PHP_SELF'];
if (!isset($this_cat_id)) {
// if we are already "home", dont make home a link
$this_cat_id ="0";
echo "Home << ";
}
// get the info and parent id for whatever category
// we’re currently in

$sql = "SELECT id, parent_id, title from kkwinch_content ";
$sql .="where id = $this_cat_id";

$show_crumb_trail = mysql_query($sql);
$num_crumbs = mysql_num_rows($show_crumb_trail);

// if we actually have some results...
if ($num_crumbs > 0) {
list($cat_id, $cat_parent, $cat_name) = mysql_fetch_row($show_crumb_trail);
$cat_id_array[$flarn] = $cat_id;
$cat_parent_id_array[$flarn] = $cat_parent;
$cat_name_array[$flarn] = $cat_name;
if ($cat_id_array[$flarn] > 0) {
mysql_free_result($show_crumb_trail);
// increment $next by one
$next = $flarn+1;
//if ($flarn == 0 ) {
//echo "<a href=\"/cmspages/\">Home</a> > ";
//}
// now lets call the function again to loop through
// the other categories
// until we’re left with none
get_crumbs($cat_parent_id_array[$flarn], $next, $keep_cat_id);

// Since $keep_cat_id is the id number of original
// category we’re in,
// now we check to see whether or not we have to
// make the real category
// name a link or not
// (If we’re looking at the main category display,
// we wouldn’t have to,
// since we’re already *in* the category.  This is
// more useful for when you have a product
// display page, that way the link back to the
// category that item or  product lives in
// will be created
if ($keep_cat_id==$cat_id_array[$flarn]) {
echo $cat_name_array[$flarn];
} else {
echo "<a href=\"../pages/?t=".$_GET['t']."&amp;parent_id=$cat_id\">$cat_name_array[$flarn]</a> > ";
}
}
}
}
?>