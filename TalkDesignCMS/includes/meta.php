<?php
if ($p==1) {
$meta_description = "Talk Design & Print offers design and printing services for business and home customers";
} else {
$meta_description = $pagetitle;
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="description" content="<?php echo $meta_description ?>" />
<meta name="keywords" content="Talk Design & Print, printing, roller banners, business cards, posters, photocopying, logo design, website design, binding, letterheads, postcards, calendars, canvas prints, christmas cards, Banner Stands, Popup Displays, Hampshire Printing, Hampshire, Southampton, Eastleigh, Romsey, Chandlers Ford, Bournemouth, Fareham, CD/DVD duplication, CD/DVD Replication, Promotional goods, Acrylic signs, metal signs, display boards, print finishing, trade printer, Andover, Orders of Service, Wedding Stationery, Party invitations, at home cards, mini labels, rubber stamps, graphic design, exhibition display, lightboxes, literature stands, personalised, domed badges, multipart forms, desk jotters, desk calendars, Alton, variable data, winchester print, Printers, Litho, Offset, Digital Printing Copy, Copying, copy shop, Designers, Designing, marketing, Business Stationery, Envelopes, Compliment Slips, menus, direct mail, Paper, Presentations, brochures, marketing literature, flyers, catalogues, posters Digital, Imaging, Artwork, graphic, reprographic, pre-press" />

<link rel="Shortcut Icon" href="/favicon.ico" type="image/x-icon" />
<link rel="alternate" href="http://twitter.com/statuses/user_timeline/97633235.rss" title="Talk Design & Print's Tweets" type="application/rss+xml" />
<link rel="alternate" type="application/rss+xml" title="Talk Design & Print on Facebook" href="http://www.facebook.com/feeds/page.php?format=atom10&amp;id=98432129237"/>


<meta name="publisher" content="Talk Design & Print" />
<meta name="copyright" content="Talk Design & Print" />
<meta name="author" content="Talk Design & Print" />
<meta name="robots" content="ALL" />
<meta name="rating" content="General" />
<meta name="revisit-after" content="7 Days" />
<meta name="classification" content="Business" />
<meta name="distribution" content="Global" />
<meta name="dc.title" content="<?php echo $pagetitle ?>" />
<meta name="dc.creator" content="Talk Design & Print" />
<meta name="dc.subject" content="Business" />
<meta name="dc.description" content="<?php echo $pagetitle ?>" />
<meta name="dc.publisher" content="Talk Design & Print" />
<meta name="dc.contributor" content="Talk Design & Print" />
<meta name="dc.date" content="" />
<meta name="dc.type" content="Design and Print" />
<meta name="format" content="html" />
<meta name="language" content="en-gb" />
<meta name="coverage" content="Global" />

<meta name="google-site-verification" content="toP8RP_W5uAeP6ioPo5368-igJL1s1EclCsFJ9P0yp0" />
<meta name="msvalidate.01" content="837E6FBF0A76C15F61423D4E5F3B587E" />
<meta name="alexaVerifyID" content="84iW9nfYFx2UszWkOrqEP_6HE2I" />

<link rel="canonical" href="<?php echo "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI']; ?>" />

<?php
if ($p <> 45) {
?>

<script type="text/javascript" src="/includes/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/includes/jquery.ui.core.js"></script>
<script type="text/javascript" src="/includes/jquery.form.js"></script>
<script type="text/javascript" src="/includes/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/includes/jquery.ui.tabs.js"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
	$('.accordion .header').click(function() {
		$(this).next().toggle('fast');
		return false;
	}).next().hide();
});
</script> 


<script type="text/javascript">
$(document).ready(function() { 
var options = { 
target: '#alert',
}; 
$('#contactForm').ajaxForm(options); 
}); 

$.fn.clearForm = function() {
  return this.each(function() {
	var type = this.type, tag = this.tagName.toLowerCase();
	if (tag == 'form')
	  return $(':input',this).clearForm();
	if (type == 'text' || type == 'password' || tag == 'textarea')
	  this.value = '';
	else if (type == 'checkbox' || type == 'radio')
	  this.checked = false;
	else if (tag == 'select')
	  this.selectedIndex = -1;
  });
};

</script>
<?php
}
?>


<script type="text/javascript" src="/includes/slides-min-jquery.js"></script>
<link href="/css/slider.css" rel="stylesheet" type="text/css" media="screen, handheld" />

<script>
$(function(){
	$('#slides').slides({
	preload: true,
	play: 6000,
	pause: 3000,
	hoverPause: true,
	generateNextPrev: false,
	effect: 'fade',
	crossfade: false
	});
});
</script>


<link media="screen" rel="stylesheet" href="/css/colorbox/colorbox.css" />

<script src="/includes/jquery.colorbox-min.js"></script>
<script>
$(document).ready(function(){
	$(".sendafile").colorbox({width:"80%", height:"80%", iframe:true});
	
	//Example of preserving a JavaScript event for inline calls.
	$("#click").click(function(){ 
		$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
		return false;
	});
});
</script>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAABDeiOumlzrXLdDrXuK7orhS-8HmYk-rxmaCMVhXrYwZKuG1OkBROIA4hLWHJgYdP4XLDksXz7W4Ibg" type="text/javascript"></script>