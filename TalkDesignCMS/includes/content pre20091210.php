<?php
switch ($p) {
case 1:

$query_news = " SELECT id, title, start_date FROM kkwinch_content WHERE published = 1 AND parent_id = 237 ORDER BY start_date DESC" .
         " LIMIT 0, 7";
$result_news = mysql_query($query_news) or die('Error, query failed');

echo '<h1 class="strap"><strong>Kall Kwik '.$kkcentre.'</strong> offers design and printing services for business and home customers</h1>';
echo '<div class="col">';
echo $full_text;
echo '<!-- col --></div>';

echo '<div class="boxnews">';
echo '<h3>Latest news</h3>';

while($row = mysql_fetch_array($result_news)) {
$news_id = $row['id'];
$news_title = $row['title'];
$news_date = $row['start_date'];
$datestr = strtotime($news_date);
$datetoshow = date('j M Y', $datestr);
$news_keywords = show_keywords($news_title);

echo '<div class="newsblock">';
echo '<div class="newsleft">';
echo '<p>'.$datetoshow.'</p>';
echo '</div>';
echo '<div class="newsright">';
echo '<p><a href="/'.$news_id.'/'.$news_keywords.'">'.$news_title.'</a></p>';
//echo '<p><a href="/?p='.$news_id.'&amp;k='.$news_keywords.'">'.$news_title.'</a></p>';
echo '</div>';
echo '<div class="clear"><!-- clear float --></div>';
echo '</div>';
echo '<div class="clear"><!-- clear float --></div>';
}

echo '<!-- box1 --></div>';
break;

default:
if ($template_type == 2) {
	$maxcolumns = 2;
	$counter = 1;
	$query_l3 = "SELECT id, title, intro_text, thumb_image FROM kkwinch_content WHERE parent_id = ".$p." AND published = 1 ORDER BY ordering ASC";
	$result_l3 = mysql_query($query_l3) or die('Error, query failed');
	$num = mysql_num_rows($result_l3);
	
	print '<p>'.$full_text.'</p>';
	
	$content = '<div class="split"><!-- split outside loop -->';
	
	while ($row = mysql_fetch_array($result_l3))
	{
	$id = $row['id'];
	$title = $row['title'];
	$intro_text = $row['intro_text'];
	$thumb_image = $row['thumb_image'];
	$keywords = show_keywords($title);
	
	$content .= '<div class="col">';
//	$content .= '<h3><a href="?p='.$id.'&amp;k='.$keywords.'">'.$title.'</a></h3>';
	$content .= '<h3><a href="/'.$id.'/'.$keywords.'">'.$title.'</a></h3>';
	if (strlen($thumb_image) <> 0) :
//	$content .= '<a href="/?p='.$id.'&amp;k='.$keywords.'"><img src="'.$thumb_image.'" alt="'.$title.'" title="'.$title.'" class="floatleft" /></a>';
	$content .= '<a href="/'.$id.'/'.$keywords.'"><img src="'.$thumb_image.'" alt="'.$title.'" title="'.$title.'" class="floatleft" /></a>';
	endif;
	$content .= '<p>'.$intro_text.'</p>';
	$content .= '<div class="view">';
	$content .= '<ul>';
//	$content .= '<li><a href="/?p='.$id.'&amp;k='.$keywords.'">View product...</a>';
	$content .= '<li><a href="/'.$id.'/'.$keywords.'">View product...</a>';
	$content .= '</li>';
	$content .= '</ul>';
	$content .= '</div>';
	$content .= '</div>';
	if ($counter==$maxcolumns)
		{
		$counter=1;
		$content .= '</div>';
		$content .= '<div class="clear"><!-- clear float --></div>';
		$content .= '<div class="split">';
		}
	else $counter++;
	}
	$content .= '<!-- split outside loop --></div>';
	
} else {
$content = $full_text;
}
echo $content;
break;
}
?>