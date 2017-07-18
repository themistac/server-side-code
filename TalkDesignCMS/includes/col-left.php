<div id="col-left">

<div id="nav">
<ul>
<li><a href="/"<?php if ($p==1): echo "id=\"selected\""; endif; ?>>Home</a></li>
<?php
$r = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE template_category_id = 1 AND level = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($r)) {
	$l1id = $row['id'];
	$l1title = $row['title'];
	$l1link_url = $row['link_url'];
	$l1keywords = show_keywords($l1title);
	echo '<li class="nav'.$l1id.'"><a href="';
	if (strlen($l1link_url) == 0) :
	echo '/'.$l1id."/".$l1keywords.'/"';
//	echo '/?p='.$l1id."&amp;k=".$l1keywords.'"';
	else:
	echo $l1link_url.'"';
	endif;
	if ($l1id == $level1_to_hilight) echo ' id="selected"';
	echo '>'.$l1title.'</a>';
	'\n';

		if ($row['id']==$p || $row['id']==$parent):
			$r2 = mysql_query("SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = {$row['id']} AND published = 1 ORDER BY ordering ASC");
				if (mysql_affected_rows()>0):
					echo "\n<ul>\n";
						while ($row2 = mysql_fetch_array($r2)) {
						$l2id = $row2['id'];
						$l2title = $row2['title'];
						$l2link_url = $row2['link_url'];
						$l2keywords = show_keywords($l2title);
//						$l2keywords = str_replace(" ", "+", $l2title);
							echo '<li><a href="';
							if (strlen($l2link_url) == 0) :
							echo '/'.$l2id."/".$l1keywords."/".$l2keywords.'/"';
//							echo '/?p='.$l2id."&amp;k=".$l2keywords.'"';
							else:
							echo $l2link_url.'"';
							endif;
						if ($l2id == $level2_to_hilight || $l2id == $level3_to_hilight) echo " id=\"subselected\"";
						echo ">$l2title</a></li>\n";
						}
					echo "</ul>\n";
				else:
					echo "</li>\n";
				endif;
		endif;
	echo "</li>\n";
}
?>
</ul>
<!-- nav --></div>

<!-- col_left --></div>