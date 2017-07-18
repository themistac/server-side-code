<?php
if($p<>1) :
echo "<p id=\"breadcrumb\">";
get_crumbs($p, "0", $p);
echo "</p>";
echo '<h1>'.$pagetitle.'</h1>';
endif; ?>
