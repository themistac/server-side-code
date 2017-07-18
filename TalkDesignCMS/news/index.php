<?php
include("../includes/common.php");
include("../includes/config.php");
include("../includes/opendb.php");
include("../includes/redirects.php");

$p=237;

// get parent level
$query_level1 = "SELECT title, parent_id, level, full_text, banner_image, banner_image_url FROM kkwinch_content WHERE id=$p";
$result_level1  = mysql_query($query_level1) or die('Error : ' . mysql_error());
$row_level1 = mysql_fetch_array($result_level1);

$parent = $row_level1['parent_id'];
$level = $row_level1['level'];
$content = $row_level1['full_text'];
$banner_image = $row_level1['banner_image'];
$banner_image_url = $row_level1['banner_image_url'];

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
}

$query_news_2011 = " SELECT id, title, start_date FROM kkwinch_content WHERE published = 1 AND parent_id = 237 AND year(start_date) = 2011 ORDER BY start_date DESC LIMIT 0, 50";
$result_news_2011 = mysql_query($query_news_2011) or die('Error, query failed');

$query_news_2010 = " SELECT id, title, start_date FROM kkwinch_content WHERE published = 1 AND parent_id = 237 AND year(start_date) = 2010 ORDER BY start_date DESC LIMIT 0, 50";
$result_news_2010 = mysql_query($query_news_2010) or die('Error, query failed');

$query_news_2009 = " SELECT id, title, start_date FROM kkwinch_content WHERE published = 1 AND parent_id = 237 AND year(start_date) = 2009 ORDER BY start_date DESC LIMIT 0, 50";
$result_news_2009 = mysql_query($query_news_2009) or die('Error, query failed');
?>

<?php include("../includes/doctype.php"); ?>
<?php include("../includes/pagetitle.php"); ?>
<?php include("../includes/meta.php"); ?>
<?php include("../includes/css.php"); ?>

<script type="text/javascript">
  $(function() {
    $('#news-archive').tabs({ fx: { opacity: 'toggle', duration: 'fast' } });
  });
</script>

</head>

<body>

<ul class="hidden">
<li><a href="#content">Skip to content</a></li>
</ul>

<div id="pagewrapper">

<?php include("../includes/header.php"); ?>

<div id="container">

<?php include("../includes/col-left.php"); ?>

<a name="content" id="content"></a>

<div id="col-main">

<?php include("../includes/banner.php"); ?>

<div id="col-mid">

<div id="col-mid-bot">

<?php include("../includes/breadcrumbs.php"); ?>










        <div id="news-archive">
            <ul>
                <li><a href="#archive-2011"><span>2011</span></a></li>
                <li><a href="#archive-2010"><span>2010</span></a></li>
                <li><a href="#archive-2009"><span>2009</span></a></li>
            </ul>
				
				<div id="archive-2011">
<?php
print '<div class="newslist margintop marginbottom">';
print '<ul>';
while($row_2011 = mysql_fetch_array($result_news_2011)) {
$news_id = $row_2011['id'];
$news_title = $row_2011['title'];
$news_date = $row_2011['start_date'];
$datestr = strtotime($news_date);
$datetoshow = date('j M Y', $datestr);

//print '<li><strong><a href="/'.$news_id.'/'.show_keywords($news_title).'">'.$news_title.'</a></strong>'.$datetoshow.'</li>';
print '<li><strong><a href="/'.$news_id.'/'.show_keywords($news_title).'">'.$news_title.'</a></strong>'.$datetoshow.'</li>';
}
print '</ul>';
print '</div>';

?>

            </div>
				
            <div id="archive-2010">
<?php
print '<div class="newslist margintop marginbottom">';
print '<ul>';
while($row_2010 = mysql_fetch_array($result_news_2010)) {
$news_id = $row_2010['id'];
$news_title = $row_2010['title'];
$news_date = $row_2010['start_date'];
$datestr = strtotime($news_date);
$datetoshow = date('j M Y', $datestr);

//print '<li><strong><a href="/'.$news_id.'/'.show_keywords($news_title).'">'.$news_title.'</a></strong>'.$datetoshow.'</li>';
print '<li><strong><a href="/'.$news_id.'/'.show_keywords($news_title).'">'.$news_title.'</a></strong>'.$datetoshow.'</li>';
}
print '</ul>';
print '</div>';

?>

            </div>

            <div id="archive-2009">
<?php
print '<div class="newslist margintop marginbottom">';
print '<ul>';
while($row_2009 = mysql_fetch_array($result_news_2009)) {
$news_id = $row_2009['id'];
$news_title = $row_2009['title'];
$news_date = $row_2009['start_date'];
$datestr = strtotime($news_date);
$datetoshow = date('j M Y', $datestr);

//print '<li><strong><a href="/'.$news_id.'/'.show_keywords($news_title).'">'.$news_title.'</a></strong>'.$datetoshow.'</li>';
print '<li><strong><a href="/'.$news_id.'/'.show_keywords($news_title).'">'.$news_title.'</a></strong>'.$datetoshow.'</li>';
}
print '</ul>';
print '</div>';

?>

            </div>


        </div>












<div class="clear"><!-- clear float --></div>
</div>
</div>
</div>

<?php include("../includes/col-right.php"); ?>

<div class="clear"><!-- clear float --></div>

<!-- container --></div>

<?php include("../includes/service-list.php"); ?>
<?php include("../includes/footer.php"); ?>

<!-- pagewrapper --></div>

<?php include("../includes/analytics.php"); ?>

</body>
</html>

<?php include("../includes/closedb.php"); ?>
