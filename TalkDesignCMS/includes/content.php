<?php
switch ($p) {
case 1:

$query_news = " SELECT id, title, start_date FROM kkwinch_content WHERE published = 1 AND parent_id = 237 ORDER BY start_date DESC" .
         " LIMIT 0, 10";
$result_news = mysql_query($query_news) or die('Error, query failed');

echo '<h1 class="strap"><strong>Talk Design &amp; Print</strong> offers design and printing services for business and home customers</h1>';
echo '<div class="col">';
echo $full_text;
echo '<!-- col --></div>';

echo '<div class="boxnews">';
echo '<h3>Our news</h3>';

while($row = mysql_fetch_array($result_news)) {
$news_id = $row['id'];
$news_title = $row['title'];
$news_date = $row['start_date'];
$datestr = strtotime($news_date);
$datetoshow = date('j M Y', $datestr);
$news_keywords = show_keywords($news_title);

echo '<p><a href="/'.$news_id.'/'.$news_keywords.'/">'.$news_title.'</a></p>';

//echo '<div class="newsblock">';
//echo '<div class="newsleft">';
//echo '<p>'.$datetoshow.'</p>';
//echo '</div>';
//echo '<div class="newsright">';
//echo '<p><a href="/'.$news_id.'/'.$news_keywords.'/">'.$news_title.'</a></p>';
//echo '<p><a href="/?p='.$news_id.'&amp;k='.$news_keywords.'">'.$news_title.'</a></p>';
//echo '</div>';
//echo '<div class="clear"><!-- clear float --></div>';
//echo '</div>';
//echo '<div class="clear"><!-- clear float --></div>';
}


//echo '<h3 style="margin-top:10px;">Industry news</h3>';

//echo fetchFeed('http://www.marketingweek.co.uk/XmlServers/navsectionRSS.aspx?navsectioncode=508', 4);	

echo '<!-- box1 --></div>';
break;

default:
if ($template_type == 2) {
	$maxcolumns = 2;
	$counter = 1;
	$query_l3 = "SELECT id, title, intro_text, thumb_image, link_url, new_product, full_cost FROM kkwinch_content WHERE parent_id = ".$p." AND published = 1 ORDER BY new_product DESC, ordering ASC";
	$result_l3 = mysql_query($query_l3) or die('Error, query failed');
	$num = mysql_num_rows($result_l3);
	
	print $full_text;
	
	$content = '<div class="split-2col"><!-- split outside loop -->';
	
	while ($row = mysql_fetch_array($result_l3))
	{
	$id = $row['id'];
	$title = $row['title'];
	$intro_text = $row['intro_text'];
	$thumb_image = $row['thumb_image'];
	$link_url = $row['link_url'];
	$new_product = $row['new_product'];
	$full_cost = $row['full_cost'];
	$keywords = show_keywords($title);
	
	if (strlen($link_url) == 0) :
	$link = '/'.$id.'/'.$keywords.'/';
	else:
	$link = $link_url;
	endif;

	if ($new_product == 1) :
	$title = $title.' <span>Featured</span>';
	else:
	$title = $title;
	endif;


	$content .= '<div class="col">';
//	$content .= '<h3><a href="?p='.$id.'&amp;k='.$keywords.'">'.$title.'</a></h3>';

$count_children = mysql_query("SELECT parent_id, id FROM kkwinch_content WHERE parent_id = $id AND published = 1");
$total_children = mysql_num_rows($count_children);
	if ($total_children == 0) {
	$content .= '<h3><a href="'.$link.'">'.$title.'</a></h3>';
	} else {
	$content .= '<h3><a href="'.$link.'">'.$title.' ('.$total_children.')</a></h3>';
	}
	
	if (strlen($thumb_image) <> 0) :
//	$content .= '<a href="/?p='.$id.'&amp;k='.$keywords.'"><img src="'.$thumb_image.'" alt="'.$title.'" title="'.$title.'" class="floatleft" /></a>';
	$content .= '<a href="'.$link.'"><img src="'.$thumb_image.'" alt="'.$title.'" title="'.$title.'" class="floatleft" /></a>';
	endif;
	$content .= '<p>'.$intro_text.'</p>';
	$content .= '<div class="view">';
//	$content .= '<ul>';
//	$content .= '<li><a href="/?p='.$id.'&amp;k='.$keywords.'">View product...</a>';
//	$content .= '<li><a href="/'.$id.'/'.$keywords.'">View product...</a>';
//	$content .= '<li><a href="'.$link.'">View product...</a>';
	$content .= '<p class="more"><a href="'.$link.'">'.$product_link_text.'</a></p>';
	if (empty($full_cost)) {
	$content .= '<p class="cost">'.$no_cost_text.'</p>';
	} else {
	$content .= '<p class="cost"><span title="Price excludes VAT and delivery">'.$full_cost.'</span></p>';
	}
//	$content .= '</li>';
//	$content .= '</ul>';
	$content .= '<div class="clear"><!-- clear float --></div>';
	$content .= '</div>';
	$content .= '</div>';
	if ($counter==$maxcolumns)
		{
		$counter=1;
		$content .= '</div>';
		$content .= '<div class="clear"><!-- clear float --></div>';
		$content .= '<div class="split-2col">';
		}
	else $counter++;
	}
	$content .= '<!-- split outside loop --></div>';
	
} else {
$content = $full_text;
if (($p == 45) or ($p == 373) or ($p == 219) or ($p == 221) or ($p == 216) or ($p == 248) or ($p == 272) or ($p == 477)  or ($p == 478) or ($p == 511) ) {
} else {
$content .= '<div class="clear"><!-- clear float --></div>';
$content .= '<div class="quoteboxtop">';
$content .= '<div class="accordion">';
$content .= '<h2 class="header"><a href="javascript:;" style="color:#fff;">For more information or advice about <strong>'.strtolower($pagetitle).'</strong> please click here contact us...</a></h2>';
$content .= '<div>';
$content .= '<div class="quoteboxbottom">';
$content .= '<div class="message"><div id="alert"></div></div>';
$content .= '<p style="padding:10px; background-color:#ddd;">Please fill in the quick form below and we will get in touch as soon as we can.</p>';
$content .= '<form action="/includes/sendmail.php" method="post" id="contactForm">';
$content .= '<input type="hidden" name="pagetitle" value="'.$pagetitle.'" />';
$content .= '<fieldset>';
$content .= '<p style="float:left; width:140px;"><label for="txtName">Your name:</label></p>';
$content .= '<p><input name="name" id="name" type="text" class="field" style="width:342px;" title="Enter your name" value="" /></p>';
$content .= '<div class="clear"><!-- clear float --></div>';
$content .= '<p style="float:left; width:140px;"><label for="txtEmail">Email address:</label></p>';
$content .= '<p><input name="email" id="email" type="text" class="field" style="width:342px;" title="Enter your email address" value="" /></p>';
$content .= '<div class="clear"><!-- clear float --></div>';
$content .= '<p style="float:left; width:140px;"><label for="txtTelephone">Telephone number:</label></p>';
$content .= '<p><input name="tele" id="tele" type="text" class="field" style="width:342px;" title="Enter your telephone number" value="" /></p>';
$content .= '<div class="clear"><!-- clear float --></div>';
$content .= '<p><label for="txtQuery">Your message or what you would like us to quote on:</label></p>';
$content .= '<p><textarea name="message" cols="50" title="Enter your message" rows="10" style="width:482px"></textarea></p>';
$content .= '<div class="clear"><!-- clear float --></div>';
$content .= '<p style="display:none;"><input name="last" id="last" type="text" value="" /></p>';
$content .= '<p style="padding:20px 0 0 0; margin:0;"><input name="Send" type="submit" value="Send" style="background-color:#666; color:#fff; padding:10px; font-size:14px; cursor:pointer;" /></p>';
$content .= '</fieldset>';
$content .= '</form>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
}
}
echo $content;
break;
}
?>