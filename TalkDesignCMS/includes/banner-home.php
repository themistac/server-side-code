<?php
if (strlen($banner_image) > 0):
	if (strlen($banner_image_url) > 0):
		echo '<div class="banner" style="padding-left:5px;"><a href="'.$banner_image_url.'"><img src="'.$banner_image.'" alt="" title="" /></a></div>';
	else:
		echo '<div class="banner"><img src="'.$banner_image.'" alt="" title="" /></div>';
	endif;
endif;
?>
