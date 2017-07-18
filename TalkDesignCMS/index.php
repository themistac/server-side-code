<?php
include("includes/common.php");
include("includes/config.php");
include("includes/opendb.php");
include("includes/redirects.php");

if (strlen($p)<=0) { $p=1; }

// get parent level
$query_level1 = "SELECT title, parent_id, level, full_text, intro_text, banner_image, banner_image_url, template_type, new_product FROM kkwinch_content WHERE id=$p AND published = 1";
$result_level1  = mysql_query($query_level1) or die('Error : ' . mysql_error());
$row_level1 = mysql_fetch_array($result_level1);

$num=mysql_numrows($result_level1);

if ($num == 0) {
header('Location: /error404.html');
}

$parent = $row_level1['parent_id'];
$level = $row_level1['level'];
$full_text = $row_level1['full_text'];
$intro_text = $row_level1['intro_text'];
$banner_image = $row_level1['banner_image'];
$banner_image_url = $row_level1['banner_image_url'];
$template_type = $row_level1['template_type'];
$new_product = $row_level1['new_product'];

switch ($level) {
case 1:
$level1_to_hilight = $p;
break;
case 2:
$level1_to_hilight = $parent;
$level2_to_hilight = $p;
break;
case 3:
$query_level3 = "SELECT title, parent_id, level FROM kkwinch_content WHERE id=$parent";
$result_level3  = mysql_query($query_level3) or die('Error : ' . mysql_error());
$row_level3 = mysql_fetch_array($result_level3);
$level2_to_hilight = $parent;
$parent_new=$row_level3['parent_id'];
$parent=$parent_new;
$level1_to_hilight = $parent_new;
break;
case 4:
$query_level4 = "SELECT parent_id FROM kkwinch_content WHERE id=$parent";
$result_level4  = mysql_query($query_level4) or die('Error : ' . mysql_error());
$row_level4 = mysql_fetch_array($result_level4);
$parent_of_level4 = $row_level4['parent_id'];

$query_level3 = "SELECT title, parent_id, level FROM kkwinch_content WHERE id=$parent_of_level4";
$result_level3  = mysql_query($query_level3) or die('Error : ' . mysql_error());
$row_level3 = mysql_fetch_array($result_level3);
$parent_of_level3 = $row_level3['parent_id'];

$parent=$parent_of_level3;
$level2_to_hilight = $parent_of_level4;
$level1_to_hilight = $parent_of_level3;
break;
}
?>

<?php include("includes/doctype.php"); ?>
<?php include("includes/pagetitle.php"); ?>
<?php include("includes/meta.php"); ?>
<?php include("includes/css.php"); ?>
<?php include("includes/pagespecific.php"); ?>
</head>

<body<?php if($p == 511) { print ' onload="load()" onunload="GUnload()"'; } ?>>

<ul class="hidden">
<li><a href="#content">Skip to content</a></li>
</ul>

<div id="pagewrapper">

<?php include("includes/header.php"); ?>

<div id="container">

<?php

if ($p == 1) {
include("includes/slider.php");
}

?>


<?php include("includes/col-left.php"); ?>

<a name="content" id="content"></a>

<?php if ($p == 1) { echo "<div style=\"float:left;\">"; } ?>

<?php if ($p == 1) { include("includes/banner-home.php"); } ?>

<div id="col-main">

<?php if ($p <> 1) { include("includes/banner.php"); } ?>

<div id="col-mid">

<div id="col-mid-bot">

<?php include("includes/breadcrumbs.php"); ?>
<?php include("includes/content.php"); ?>

<div class="clear"><!-- clear float --></div>
</div>
</div>
</div>

<?php include("includes/col-right.php"); ?>

<?php if ($p == 1) { echo "</div> <!-- end extra banner div -->"; } ?>

<div class="clear"><!-- clear float --></div>

<?php include("includes/featured-products.php"); ?>

<!-- container --></div>

<!-- pagewrapper --></div>

<div id="footer-wrapper">

<?php include("includes/service-list.php"); ?>
<?php include("includes/footer.php"); ?>

<!-- footer-wrapper --></div>


<?php include("includes/analytics.php"); ?>

</body>
</html>

<?php include("includes/closedb.php"); ?>
