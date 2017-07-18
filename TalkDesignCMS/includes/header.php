<div id="headercontainer">
<a href="/" id="logo"><span><p class="hidden">Talk Design &amp; Print - <?php echo $kktelephone ?></p></span></a>
<div id="phonenumber">
<p><a href="mailto:<?php echo $kkemail ?>"><?php echo $kkemail ?></a>&nbsp;&nbsp;&nbsp; <?php echo $kktelephone ?></p>
</div>


<div class="clear"><!-- clear float --></div>

<div id="search">
<form accept-charset="utf-8" action="http://search.freefind.com/find.html" method="get">
<fieldset>
<legend>Search</legend>
<input type="hidden" name="si" value="49744884" />
<input type="hidden" name="pid" value="r" />
<input type="hidden" name="n" value="0" />
<input type="hidden" name="_charset_" value="" />
<input type="hidden" name="bcd" value="&#247;" />
<input name="query" type="text" value="" />
<input name="Search" type="submit" value="Search" class="search-button" />
</fieldset>
</form>
</div>


<div class="clear"><!-- clear float --></div>

<div id="mininav">
<ul>
<?php
$query_mininav = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE template_category_id = 2 AND level = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_mininav)) {
$mininav_title = $row['title'];
$mininav_id = $row['id'];
$mininav_link_url = $row['link_url'];
$mininav_keywords = show_keywords($mininav_title);

if (strlen($mininav_link_url) == 0) :
echo '<li><a href="/'.$mininav_id.'/'.$mininav_keywords.'/">'.$mininav_title.'</a></li>';
//echo "<li><a href=\"/?p=$mininav_id&amp;k=$mininav_keywords\">$mininav_title</a></li>\n";
else:
echo "<li><a href=\"$mininav_link_url\">$mininav_title</a></li>";
endif;
}
?>
</ul>
<!-- mininav --></div>

<div class="clear"><!-- clear float --></div>
<!-- headercontainer --></div>
