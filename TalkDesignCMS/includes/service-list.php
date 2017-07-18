<div id="services-box-top">
<div id="services-box-bot">

<div id="services">
    
<h3>Our complete service list</h3>

<div class="services-col">
<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 2');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 2 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>
</div>

<div class="services-col"> 
<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 3');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 3 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>
    
<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 4');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 4 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>

<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 45');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 45 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>


</div>

<div class="services-col">
<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 5');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 5 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>
</div>

<div class="services-col">
<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 7');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 7 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>

<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 244');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 244 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>

<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 6');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 6 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>

</div>

<div class="services-col">
<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 8');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 8 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>
</div>

<div class="services-col">
<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 9');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 9 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>
</div>

<div class="services-col">
<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 10');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 10 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>

<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 291');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 291 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>

<ul>
<?php
$query = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE id = 217');
while ($row = mysql_fetch_array($query)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a>
<?php
}
?>
<ul>
<?php
$query_services = mysql_query('SELECT id, title, link_url FROM kkwinch_content WHERE parent_id = 217 AND template_category_id = 1 AND published = 1 AND NOT level = 0 ORDER BY ordering ASC');
while ($row = mysql_fetch_array($query_services)) {
$service_title = $row['title'];
$service_id = $row['id'];
$keywords = show_keywords($row['title']);
$link_url = $row['link_url'];
if (strlen($link_url) == 0) :
$service_link = '/'.$service_id.'/'.$keywords.'/';
else:
$service_link = $link_url;
endif;
?>
<li><a href="<?php echo $service_link; ?>"><?php echo $service_title ?></a></li>
<?php
}
?>
</ul>
</li>
</ul>
</div>

<div class="clear"><!-- clear float --></div>

<!-- services --></div>

<!-- services box-top --></div>
<!-- services box-bot --></div>
