<?php
include '../common/protect.php';
include '../common/config.php';
include '../common/opendb.php';
include_once("../fckeditor/fckeditor.php") ;
//require_once ("../ckfinder/ckfinder.php") ;


$tbl_name = "kkwinch_content"; // Table name
$folder_name = "pages"; // folder name
$t = $_GET['t']; // get publication type from address
$id = $_GET['id']; // get id
$parent = $_GET['parent_id']; // get parent_id
$action = $_GET['a'];
$gobackto = $_GET['gobackto'];

$query = "insert into kkwinch_content ".
			"(template_category_id, title, parent_id, intro_text, full_text, thumb_image, banner_image, banner_image_url, link_url, start_date, ordering, published, level, template_type, new_product, short_cost, full_cost) ".
			"SELECT template_category_id, title, parent_id, intro_text, full_text, thumb_image, banner_image, banner_image_url, link_url, start_date, ordering, '0', level, template_type, new_product, short_cost, full_cost ".
	      "FROM $tbl_name ".
			"WHERE id = '$id'";
$result = mysql_query($query) or die('Error : ' . mysql_error());


header('location: http://www.kkwinchester.com/apps/cms/pages/?t='.$t.'&parent_id='.$parent.'');
?>