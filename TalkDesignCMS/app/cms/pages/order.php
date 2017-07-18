<?php
include '../common/protect.php';
include '../common/config.php';
include '../common/opendb.php';

$tbl_name = "kkwinch_content"; // Table name
$folder_name = "pages"; // folder name
$t = $_GET['t']; // get publication type from address
$parent_id = $_GET['parent_id']; // get publication type from address
$parent = $_GET['parent_id']; // get publication type from address

// get template_category
$query = "SELECT title FROM kkwinch_template_category WHERE id = $t";
$result = mysql_query($query) or die('Error : ' . mysql_error());
$row = mysql_fetch_array($result);
$category = $row['title'];

// get parent
$query = "SELECT title FROM $tbl_name WHERE id = $parent_id";
$result = mysql_query($query) or die('Error : ' . mysql_error());
$row = mysql_fetch_array($result);
$page_we_are_on = $row['title'];

// get type from db
$query = " SELECT * " .
	" FROM $tbl_name " .
	" WHERE template_category_id = " . $t .
	" AND parent_id = " . $parent_id .
	" ORDER BY ordering ASC";

$result = mysql_query($query) or die('Error : ' . mysql_error());

$connection = mysql_connect ("localhost", "talkde39_talkdbu", "Lwa0XmX+yXq;");
mysql_select_db("talkde39_talk",$connection) or die("no db found");
$sql = "select * from kkwinch_content where parent_id=$parent_id AND template_category_id = $t order by ordering asc";
$result = mysql_query($sql)or die(mysql_error());
$number = mysql_num_rows($result);
for($x=1;$x<=$number;$x++){
	$row = mysql_fetch_array($result);
	$list.= "		   <li id=\"item_$row[id]\">$row[title]</li>\n";
}

include '../common/breadcrumb.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="eng">
<head>
<title><?php echo $page_we_are_on ?> : Change Order</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" media="screen" href="../common/screen.css" />
<script type="text/javascript" src="../common/functions.js"></script>
<script type="text/javascript" src="../sortable/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="../sortable/scriptaculous/src/scriptaculous.js"></script>

</head>

<body>
<div id="wrapper">
<div id="contentwrapper">
<?php include '../common/header.php'; ?>
<div id="breadcrumb">
<p><a href="../home/">Admin home</a> > <a href="../<?php echo $folder_name; ?>/?t=<?php echo $t ?>&amp;parent_id=1"><?php echo $category; ?> Pages</a> > <?php
if($p<>1) :
get_crumbs($parent_id, "0", $parent_id);
endif; ?></p>
</div>

<div id="maincontent">
<h2><?php echo $page_we_are_on ?> : Change order</h2>

<div id="maintable">

<div id="infofade" class="updateinfo">Drag to sort your page order</div>

<div class="actionbox-top">
<div class="actionbox-bottom">
<button type="button" class="greybutton" value="Done" id="Done" onclick="javascript:cancel('../<?php echo $folder_name; ?>/?t=<?php echo $t; ?>&amp;parent_id=<?php echo $parent; ?>');"><span><img src="../common/accept-16x16.png" alt="" />Done</span></button>
<div class="clear"><!-- clear float --></div>
</div>
</div>

<div class="box-top">
<div class="box-bottom">


<ul id = "sortlist">
<?php echo $list; ?>
</ul>
<script type="text/javascript">
Sortable.create('sortlist',{
onUpdate:function(){
					new Ajax.Updater('infofade','sort.php',{onComplete:function(request){}, parameters:Sortable.serialize('sortlist'), evalScripts:true, asynchronous:true})
				}
			})
		</script>
</div>
</div>

<div class="actionbox-top">
<div class="actionbox-bottom">
<button type="button" class="greybutton" value="Done" id="Done" onclick="javascript:cancel('../<?php echo $folder_name; ?>/?t=<?php echo $t; ?>&amp;parent_id=<?php echo $parent; ?>');"><span><img src="../common/accept-16x16.png" alt="" />Done</span></button>
<div class="clear"><!-- clear float --></div>
</div>
</div>

</div>
</div>
<?php include '../common/footer.php'; ?>
</div>
</div>
</body>
</html>
<?php include '../common/closedb.php'; ?>
