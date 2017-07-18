<?php
switch ($p) {
case 1:
echo "<title>Talk Design & Print - $kktelephone</title>\n";
break;
default:
$pagetitle = $row_level1['title'];

	if ($new_product == 1) :
//	$pagetitle = $pagetitle.' - FEATURED PRODUCT!';
	$pagetitle = $pagetitle;
	else:
	$pagetitle = $pagetitle;
	endif;

echo "<title>$pagetitle - Talk Design & Print</title>\n";
break;
}
?>
