<?php
include '../common/protect.php';
include '../common/config.php';
include '../common/opendb.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>konduceCMS by Talk Design & Print</title>
<meta charset="UTF-8" />

<link rel="stylesheet" type="text/css" media="screen" href="../common/screen.css" />

</head>

<body>

<div id="wrapper">
<div id="contentwrapper">

<?php include '../common/header.php'; ?>
<div id="breadcrumb">
<p>Admin home</p>
</div>


<div id="maincontent">

<h2 class="pages">Pages</h2>

<div class="col col3">
<h3>Content</h3>
<p>Create, edit and delete content on your site.</p>
<p><a href="../pages/?t=1&amp;parent_id=1">Main Navigation</a></p>
<p><a href="../pages/?t=2&amp;parent_id=1">Mini Navigation</a></p>
<p><a href="../pages/?t=3&amp;parent_id=1">Footer Navigation</a></p>
<p><a href="../pages/?t=4&amp;parent_id=1">Right hand column</a></p>
<p><a href="../pages/?t=5&amp;parent_id=1">Right hand column (Homepage)</a></p>
</div>

<div class="col col3">
<h3>News</h3>
<p>Create, edit and delete news on your site.</p>
<p><a href="../pages/?t=2&parent_id=237">News</a></p>
</div>

<div class="col col3">
<h3>Recently updated</h3>
<p>Select a page to edit.</p>
<?php
$query_newproduct = " SELECT id, title, parent_id, template_category_id FROM kkwinch_content ORDER BY modified DESC LIMIT 0, 10";
$result_newproduct = mysql_query($query_newproduct) or die('Error, query failed');

while($row = mysql_fetch_array($result_newproduct)) {
$id = $row['id'];
$title = $row['title'];
$parent_id = $row['parent_id'];
$template_type = $row['template_category_id'];

echo '<p style="clear:both;"><a href="../pages/edit.php?a=edit&t='. $template_type .'&parent_id='.$parent_id.'&id='.$id.'&gobackto='.$parent_id.'">'.$title.'</a></p>';
}
?>

</div>


<div class="clear"><!-- clear float --></div>

<?php if ($_SESSION['myuserlevel'] < $adminuserlevel): ?>

<div class="clear" style="margin-bottom:20px;"><!-- clear float --></div>

<h2 class="users">Users</h2>

<div class="col col3">
<p>Create, edit and delete users of konduceCMS.</p>
<p><a href="../users/users.php">Edit Users</a></p>
<p>Edit User Level (coming soon)</p>
</div>
<div class="clear"><!-- clear float --></div>
<?php endif ?>



</div>

<?php include '../common/footer.php'; ?>

</div>
</div>

</body>
</html>

<?php include '../common/closedb.php'; ?>
