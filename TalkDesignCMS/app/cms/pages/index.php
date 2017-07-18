<?php
include '../common/protect.php';
include '../common/config.php';
include '../common/opendb.php';

$tbl_name = "kkwinch_content"; // Table name
$folder_name = "pages"; // Table name
$t = $_GET['t']; // get publication type from address
$parent = $_GET['parent_id']; // get publication type from address
$parent_id = $_GET['parent_id']; // get publication type from address

// get template category
$query = "SELECT title FROM kkwinch_template_category WHERE id = $t";
$result = mysql_query($query) or die('Error : ' . mysql_error());
$row = mysql_fetch_array($result);
$category = $row['title'];

// get publication title
$query = "SELECT title, level, parent_id FROM $tbl_name WHERE id = $parent_id";
$result = mysql_query($query) or die('Error : ' . mysql_error());
$row = mysql_fetch_array($result);
$parent_of_parent = $row['parent_id'];
$page_we_are_on = $row['title'];
$level_we_are_at = $row['level'];
$level_we_want = $level_we_are_at + 1;

// get list
$query = " SELECT * " .
	" FROM $tbl_name " .
	" WHERE parent_id = " . $parent_id . "" .
	" AND template_category_id = " . $t . "";
	if ($parent_id == 237):
	$query .= " ORDER BY start_date DESC";
	else:
	$query .= " ORDER BY ordering ASC";
	endif;

$result = mysql_query($query) or die('Error : ' . mysql_error());

if(isset($_GET['del'])) {
// remove the article from the database
$query = "DELETE FROM $tbl_name WHERE id = '{$_GET['del']}'";
mysql_query($query) or die('Error : ' . mysql_error());

// redirect to current page so when the user refresh this page
// after deleting an article we won't go back to this code block
header('Location:../pages/?t='.$t.'&parent_id='.$parent_id.'');
exit;
}

include '../common/breadcrumb.php';

?>


<!DOCTYPE html>
<html>
<head>
<title><?php echo $page_we_are_on ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" media="screen" href="../common/screen.css" />

<script language="javascript">
function delArticle(id, title)
{
	if (confirm("Are you sure you want to delete '" + title + "'?"))
	{
		window.location.href = '<?php echo $_SERVER['REQUEST_URI']; ?>&del=' + id;
	}
}
</script>
</head>

<body>
<div id="wrapper">
<div id="contentwrapper">
<?php include '../common/header.php'; ?>
<div id="breadcrumb">
<p><a href="../home/">Admin home</a> > <a href="../<?php echo $folder_name; ?>/?t=<?php echo $t ?>&amp;parent_id=1"><?php echo $category; ?> Pages</a> > <?php
if($p<>1) :
get_crumbs($parent, "0", $parent);
endif; ?> 
</p>
</div>

<div id="maincontent">
<h2><?php echo $page_we_are_on ?></h2>
<div id="addlist">
<ul>
<li><a href="edit.php?a=add&amp;t=<?php echo $t ?>&amp;parent_id=<?php echo $parent_id ?>&amp;level=<?php echo $level_we_want ?>&amp;gobackto=<?php echo $parent_id ?>" id="addnew">Add a new page to <?php echo $page_we_are_on ?></a></li>
<li><a href="edit.php?a=edit&amp;t=<?php echo $t ?>&amp;parent_id=<?php echo $parent_of_parent ?>&amp;id=<?php echo $parent_id ?>&amp;gobackto=<?php echo $parent_id ?>" id="edit">Edit <?php echo $page_we_are_on ?> page</a></li>
<?php
if (mysql_num_rows($result) > 0):
?>
<?php
if ($parent_id <> 237):
?>
<li><a href="order.php?t=<?php echo $t ?>&amp;parent_id=<?php echo $parent_id ?>" id="order">Edit page order for <?php echo $page_we_are_on ?></a></li>
<?php endif; ?>
<?php endif; ?>
</ul>
</div>

<div id="maintable">
<?php
if (mysql_num_rows($result) > 0):
?>
<table border="0" cellpadding="0" cellspacing="0">
<tr align="center" bgcolor="#CCCCCC"> 
<td width=""><div style="padding:7px;"><strong>ID</strong></div></td>
<td width="600"><div style="padding:7px;"><strong>Title</strong></div></td>
<td width="100"><div style="padding:7px 0;"><strong>Published</strong></div></td>
<td width="100" align="center"><div style="padding:7px 0;"><strong>Action</strong></div></td>
</tr>
<?php
while($row = mysql_fetch_array($result))
{
$id = $row['id'];
$title = $row['title'];
$full_text = $row['full_text'];
$ispublished = $row['published'];

if ($ispublished == 1) :
$published = '<span style="color:green">Live</span>';
else:
$published = '<span style="color:red">Draft</span>';
endif;

?>
<tr onmouseover="this.bgColor='#eeeeee'" onmouseout="this.bgColor='#ffffff'">
<td><a href="?t=<?php echo $t ?>&amp;parent_id=<?php echo $id;?>" style="padding:7px; text-decoration:none; display:block;"><?php echo $id;?></a></td>
<td><a href="?t=<?php echo $t ?>&amp;parent_id=<?php echo $id;?>" style="padding:7px; text-decoration:none; display:block;"><?php echo $title;?>

<?php if (strlen($full_text) < 230) {
echo "<strong>(There isn't much text here!)</strong>";
}
?>

</a></td>
<td><a href="?t=<?php echo $t ?>&amp;parent_id=<?php echo $id;?>" style="padding:7px; text-decoration:none; display:block;"><?php echo $published;?></a></td>
<td align="center"><!-- <a href="?t=<?php echo $t ?>&amp;parent_id=<?php echo $id;?>"><img src="/apps/cms/common/next-16x16.png" alt="Show Next Level" title="Show Next Level" /></a>&nbsp;&nbsp;&nbsp; --><a href="edit.php?a=edit&amp;t=<?php echo $t ?>&amp;parent_id=<?php echo $parent_id;?>&amp;id=<?php echo $id;?>&amp;gobackto=<?php echo $parent_id ?>"><img src="../common/page-edit-16x16.png" alt="Edit" title="Edit" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:delArticle('<?php echo $id;?>', '<?php echo $title;?>');"><img src="../common/delete-16x16.png" alt="Delete" title="Delete" /></a>&nbsp;&nbsp;&nbsp;<a href="copy.php?t=<?php echo $t ?>&amp;parent_id=<?php echo $parent_id;?>&amp;id=<?php echo $id;?>&amp;gobackto=<?php echo $parent_id ?>"><img src="../common/copy-16x16.png" alt="Copy" title="Copy" /></a></td>
</tr>
<?php
}
?>
</table>
<?php
else:
echo ('<p>There are no pages in '.$page_we_are_on.'.</p>');
endif;
?>
</div>
</div>
<?php include '../common/footer.php'; ?>
</div>
</div>
</body>
</html>
<?php include '../common/closedb.php'; ?>
