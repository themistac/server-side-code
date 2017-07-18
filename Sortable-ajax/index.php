<?php
$connection = mysql_connect ("localhost", "******", "******");
mysql_select_db("db272307476",$connection) or die("no db found");
$sql = "select * from kkwinch_content where parent_id=2 order by ordering asc";
$result = mysql_query($sql)or die(mysql_error());
$number = mysql_num_rows($result);
for($x=1;$x<=$number;$x++){
	$row = mysql_fetch_array($result);
	$list.= "		   <li id=\"item_$row[id]\">$row[title]</li>\n";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<script type="text/javascript" src="prototype-1.6.0.3.js"></script>
		<script type="text/javascript" src="scriptaculous/src/scriptaculous.js"></script>
		<style type = "text/css">
			ul#sortlist{list-style:none;padding:0px;margin:0px}
			ul#sortlist li{padding:5px;border:1px solid #666666;margin:1px;font:normal 10px verdana;width:200px;color:#666666;background-color:#f0f0f0;cursor:move}
			#output{font:bold 10px verdana}
		</style>
	</head>

	<body>
		<ul id = "sortlist">
<?php echo $list; ?>
		</ul>
		<div id = "output">Drag to sort your favourite colors</div>
		<script type="text/javascript">
			Sortable.create('sortlist',{
				onUpdate:function(){
					new Ajax.Updater('output','sort.php',{onComplete:function(request){}, parameters:Sortable.serialize('sortlist'), evalScripts:true, asynchronous:true})
				}
			})
		</script>
	</body>
</html>
