<div id="headercontainer">
<a href="/" id="logo"><span><h1 class="hidden">Kall Kwik <?php echo $kkcentre ?> - Design &amp; Printing Company - <?php echo $kktelephone ?></h1></span></a>
<div id="phonenumber">
<p><a href="mailto:<?php echo $kkemail ?>"><?php echo $kkemail ?></a>&nbsp;&nbsp;&nbsp; <?php echo $kktelephone ?></p>
</div>

<div class="clear"><!-- clear float --></div>

<div id="mininav">
<ul>
<?php
$query_mininav = mysql_query('SELECT id, title FROM kkwinch_content WHERE template_category_id = 2 AND level = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_mininav)) {
$mininav_title = $row['title'];
$mininav_id = $row['id'];
$l1keywords = str_replace(" ", "+", $row['title']);
?>
<li><a href="/?p=<?php echo $mininav_id; ?>&amp;k=<?php echo $l1keywords ?>"><?php echo $mininav_title ?></a></li>
<?php
}
?>
</ul>
<div class="clear"><!-- clear float --></div>
<!-- mininav --></div>

<div class="clear"><!-- clear float --></div>
<!-- headercontainer --></div>
<div class="clear"><!-- clear float --></div>
