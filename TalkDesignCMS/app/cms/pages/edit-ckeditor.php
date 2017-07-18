<?php
include '../common/protect.php';
include '../common/config.php';
include '../common/opendb.php';
//include_once("../fckeditor/fckeditor.php") ;
//require_once ("../ckfinder/ckfinder.php") ;


$tbl_name = "kkwinch_content"; // Table name
$folder_name = "pages"; // folder name
$t = $_GET['t']; // get publication type from address
$id = $_GET['id']; // get id
$parent = $_GET['parent_id']; // get parent_id
$action = $_GET['a'];
$gobackto = $_GET['gobackto'];

// get template_category
$query = "SELECT title FROM kkwinch_template_category WHERE id = $t";
$result = mysql_query($query) or die('Error : ' . mysql_error());
$row = mysql_fetch_array($result);
$category = $row['title'];

// get template_category (position)
$query_template = "SELECT id, title FROM kkwinch_template_category";
$result_template = mysql_query($query_template) or die('Error : ' . mysql_error());

// get template_type
$query_template_type = "SELECT id, title FROM kkwinch_template_type";
$result_template_type = mysql_query($query_template_type) or die('Error : ' . mysql_error());

if ($action == 'edit' or $action == 'save') :
$query_title = "SELECT title FROM $tbl_name WHERE id = $id";
$result_title = mysql_query($query_title) or die('Error : ' . mysql_error());
$row_title = mysql_fetch_array($result_title);
$pagetitle = $row_title['title'];
else:
$query_title = "SELECT title FROM $tbl_name WHERE id = $parent";
$result_title = mysql_query($query_title) or die('Error : ' . mysql_error());
$row_title = mysql_fetch_array($result_title);
$pagetitle = $row_title['title'];
$start_date = date("Y-m-d");
endif;

include '../common/breadcrumb.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="eng">
<head>
<title><?php echo $pagetitle ?> : Edit Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="screen" href="../common/screen.css" />
<script type="text/javascript" src="../calendar/calendarDateInput.js"></script>
<script type="text/javascript" src="../common/functions.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

</head>

<body>

<div id="wrapper">
<div id="contentwrapper">
<?php include '../common/header.php'; ?>
<div id="breadcrumb">
<p><a href="../home/">Admin home</a> > <a href="../<?php echo $folder_name; ?>/?t=<?php echo $t ?>&amp;parent_id=1"><?php echo $category; ?> Pages</a> > <?php
if($p<>1) :
get_crumbs($parent_id, "0", "0");
if ($action == 'add') : echo 'Add Page'; else: echo 'Edit Page'; endif;
endif; ?></p>
</div>

<div id="maincontent">

<h2><?php echo $pagetitle ?> <span style="font-size:80%; color:#999; font-weight:normal;">[<?php if ($action == 'add') : echo 'Add'; else: echo 'Edit'; endif; ?> Page]</span></h2>

<?php echo $query_update ?>

<?php
if($action=='edit')
{

$query = "SELECT template_category_id, title, parent_id, intro_text, full_text, banner_image, banner_image_url, link_url, published, level, start_date, thumb_image, template_type ".
	      "FROM $tbl_name ".
			"WHERE id = '$id'";
	$result = mysql_query($query) or die('Error : ' . mysql_error());
	list($template_category_id, $title, $parent_id, $intro_text, $full_text, $banner_image, $banner_image_url, $link_url, $published, $level, $start_date, $thumb_image, $template_type) = mysql_fetch_array($result, MYSQL_NUM);
	
//$full_text = htmlspecialchars($full_text);
//$full_text = htmlentities($full_text, ENT_QUOTES);
$full_text = (convert_smart_quotes($full_text));
$full_text = str_replace('&pound;', '£', $full_text);
$full_text = str_replace('&rsquo;', "'", $full_text);
if ($start_date == '0000-00-00' or $start_date == '1899-11-30' ) {
$start_date = '2009-02-02';
}
}

else if($action=='saveadd')
{
	$page_id              = $_POST['page_id'];
	$template_category_id = $_POST['template_category_id'];
	$title                = $_POST['title'];
	$parent_id            = $_POST['parent_id'];
	$intro_text           = $_POST['intro_text'];
	$full_text            = $_POST['full_text'];
	$banner_image         = $_POST['banner_image'];
	$banner_image_url     = $_POST['banner_image_url'];
	$link_url             = $_POST['link_url'];
	$published            = $_POST['published'];
	$level                = $_POST['level'];
	$start_date           = $_POST['start_date'];
	$thumb_image          = $_POST['thumb_image'];
	$template_type        = $_POST['template_type'];
	
	if(!get_magic_quotes_gpc())
	{
		$title      = addslashes($title);
		$full_text  = addslashes($full_text);
		$intro_text = addslashes($intro_text);
	}

	$title = (convert_smart_quotes($title));
	$full_text = (convert_smart_quotes($full_text));
	$full_text = str_replace('£', '&pound;', $full_text);
	$full_text = str_replace('…', '...', $full_text);

	$query = "INSERT INTO $tbl_name (template_category_id, title, parent_id, intro_text, full_text, banner_image, banner_image_url, link_url, published, level, start_date, thumb_image, template_type)" .
				" VALUES ('$template_category_id', '$title', '$parent_id', '$intro_text', '$full_text', '$banner_image', '$banner_image_url', '$link_url', '$published', '$level', '$start_date', '$thumb_image', '$template_type')";
	mysql_query($query) or die('Error : ' . mysql_error());

	// now we will display $title & $full_text
	// so strip out any slashes
	$title   = stripslashes($title);
	$full_text = stripslashes($full_text);
	$full_text = str_replace('&pound;', '£', $full_text);
	$intro_text = stripslashes($intro_text);
	echo '<script language="javascript" type="text/javascript">';
	echo 'location.replace("../pages/?t='.$t.'&parent_id='.$parent.'");';
	echo '</script>';

echo "<p id=\"infofade\" class=\"updateinfo\"><script>waittofade();</script>Page '$title' added</p>";

}

else if($action=='save')
{
/*
$id
$template_category_id
$title
$parent_id
$intro_text
$full_text
$published
$level
*/
	$page_id              = $_POST['page_id'];
	$template_category_id = $_POST['template_category_id'];
	$title                = $_POST['title'];
	$parent_id            = $_POST['parent_id'];
	$intro_text           = $_POST['intro_text'];
	$full_text            = $_POST['full_text'];
	$banner_image         = $_POST['banner_image'];
	$banner_image_url     = $_POST['banner_image_url'];
	$link_url             = $_POST['link_url'];
	$published            = $_POST['published'];
	$level                = $_POST['level'];
	$start_date           = $_POST['start_date'];
	$thumb_image          = $_POST['thumb_image'];
	$template_type        = $_POST['template_type'];
	
	$title = (convert_smart_quotes($title));
	$full_text = str_replace('£', '&pound;', $full_text);
	$full_text = str_replace('…', '...', $full_text);
	$full_text = (convert_smart_quotes($full_text));

if(!get_magic_quotes_gpc())
	{
		$title      = addslashes($title);
		$full_text  = addslashes($full_text);
		$intro_text = addslashes($intro_text);
	}

	// update the page in the database
	$query_update = "UPDATE $tbl_name SET ".
	         "template_category_id = '$template_category_id', " .
				"title = '$title', " .
				"parent_id = '$parent_id', " .
				"intro_text = '$intro_text', " .
				"full_text = '$full_text', " .
				"banner_image_url = '$banner_image_url', " .
				"banner_image = '$banner_image', " .
				"link_url = '$link_url', " .
				"published = '$published', " .
				"level = '$level', " .
				"start_date = '$start_date', " .
				"thumb_image = '$thumb_image', " .
				"template_type = '$template_type' " .
				"WHERE id = $page_id";

	mysql_query($query_update) or die('Error : ' . mysql_error());

	echo "<p id=\"infofade\" class=\"updateinfo\"><script>waittofade();</script>Page updated</p>";
	
	// now we will display $title & $full_text
	// so strip out any slashes
	$title   = stripslashes($title);
	$full_text = stripslashes($full_text);
	$full_text = str_replace('&pound;', '£', $full_text);
	$intro_text = stripslashes($intro_text);
}

include '../common/closedb.php';
?>

<form method="post" action="edit.php?a=<?php if($action=='add'): echo 'saveadd'; else: echo 'save'; endif; ?>&amp;t=<?php echo $t;?>&amp;parent_id=<?php echo $parent;?>&amp;id=<?php echo $id;?>&amp;gobackto=<?php echo $gobackto;?>">
<input type="hidden" name="page_id" value="<?php echo $id;?>">
<input type="hidden" name="parent_id" value="<?php echo $parent;?>">

<div class="actionbox-top">
<div class="actionbox-bottom">
<button type="submit" class="greybutton" name="save" value="Save" id="save"><span><img src="../common/accept-16x16.png" alt="" />Save Changes</span></button>
<span class="formcancel">or 
<?php if(isset($_POST['save'])): echo '<a href="../'.$folder_name.'/?t='.$t.'&amp;parent_id='.$gobackto.'">finish</a>'; 
else:
echo '<a href="'.$HTTP_REFERER.'">cancel</a>';
endif;
?>
</span>
<div class="clear"><!-- clear float --></div>

</div>
</div>

<div class="box-top">
<div class="box-bottom">

<div class="textbox1">
<label class="col">Title:</label>
<div class="col formright">
<input name="title" type="text" class="box" id="title" value="<?php echo $title;?>" />
</div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<p>Content:</p>
<textarea name="full_text"><?php echo $full_text;?></textarea>
<script type="text/javascript">
CKEDITOR.replace( 'full_text' );
</script>
</div>

<div class="textbox1">
<label class="col">Intro:</label>
<div class="col formright">
<textarea name="intro_text" class="box" id="intro_text"><?php echo $intro_text;?></textarea>
</div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<label class="col">Thumb image:</label>
<div class="col formright">
<input name="thumb_image" type="text" class="box" id="banner_image" value="<?php echo $thumb_image;?>" />
<p class="note">e.g. /userfiles/image/largeformat/flip-chart-thumb.jpg</p>
</div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<label class="col">Position:</label>
<div class="col formright">
<select name="template_category_id">
<?php
while($row_template = mysql_fetch_array($result_template))
{
$template_id = $row_template['id'];
$template_title = $row_template['title'];
?>
<option value="<?php echo $template_id;?>"<?php if ($t == $template_id) { echo ' selected="selected"'; } ?>><?php echo $template_title;?></option>
<?php
}
?>
</select>
</div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<label class="col">Template type:</label>
<div class="col formright">
<select name="template_type">
<?php
while($row_template_type = mysql_fetch_array($result_template_type))
{
$template_type_id = $row_template_type['id'];
$template_type_title = $row_template_type['title'];
?>
<option value="<?php echo $template_type_id;?>"<?php if ($template_type == $template_type_id) { echo ' selected="selected"'; } ?>><?php echo $template_type_title;?></option>
<?php
}
?>
</select>
<p class="note">NOTE: 'Full text' will show content entered above</p>
</div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1 removebottomborder">
<label class="col">Banner image:</label>
<div class="col formright">
<input name="banner_image" type="text" class="box" id="banner_image" value="<?php echo $banner_image;?>" />
<p class="note">e.g. /images/common/banner-homepage.jpg</p>
</div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<label class="col">Banner image URL:</label>
<div class="col formright">
<input name="banner_image_url" type="text" class="box" id="banner_image_url" value="<?php echo $banner_image_url;?>" />
<p class="note">e.g. /?p=27&amp;k=Variable+Data</p>
</div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<label class="col">Alternate URL:</label>
<div class="col formright">
<input name="link_url" type="text" class="box" id="link_url" value="<?php echo $link_url;?>" />
<p class="note">NOTE: Add a URL here if you want to link outside the CMS</p>
</div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<label class="col">Date:</label>
<div class="col" style="width:500px"><script>DateInput('start_date', true, 'YYYY-MM-DD', '<?php echo $start_date;?>')</script></div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1">
<label class="col">Level:</label>
<div class="col formright">
<select name="level">
<option value="0"<?php if ($level == 0) { echo ' selected="selected"'; } ?>>Level 0</option>
<option value="1"<?php if ($level == 1) { echo ' selected="selected"'; } ?>>Level 1</option>
<option value="2"<?php if ($level == 2) { echo ' selected="selected"'; } ?>>Level 2</option>
<option value="3"<?php if ($level == 3) { echo ' selected="selected"'; } ?>>Level 3</option>
</select>
</div>
<div class="clear"><!-- clear float --></div>
</div>

<div class="textbox1 removebottomborder">
<label class="col">Save as:</label>
<div class="col formright">
<select name="published">
<option value="0"<?php if ($published == 0) { echo ' selected="selected"'; } ?>>Draft</option>
<option value="1"<?php if ($published == 1 or $action=='add') { echo ' selected="selected"'; } ?>>Live</option>
</select>
</div>
<div class="clear"><!-- clear float --></div>
</div>


</div>
</div>


<div class="actionbox-top">
<div class="actionbox-bottom">
<button type="submit" class="greybutton" name="save" value="Save" id="save"><span><img src="../common/accept-16x16.png" alt="" />Save Changes</span></button>
<span class="formcancel">or 
<?php if(isset($_POST['save'])): echo '<a href="../'.$folder_name.'/?t='.$t.'&amp;parent_id='.$gobackto.'">finish</a>'; 
else:
echo '<a href="'.$HTTP_REFERER.'">cancel</a>';
endif;
?>
</span>
<div class="clear"><!-- clear float --></div>

</div>
</div>
</form>
</div>
<?php include '../common/footer.php'; ?>
</div>
</div>
</body>
</html>