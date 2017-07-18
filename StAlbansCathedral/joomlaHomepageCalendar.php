<?php
$calendardate = date("Y-m-d");
$datestr = strtotime($calendardate);
$startdate = strftime('%e %b %Y', $datestr);

$calendaryear = strftime('%Y', $datestr); //2008
$calendarmonth = strftime('%B', $datestr); // December
$calendarmonthnumber = strftime('%m', $datestr); // 01 to 12
$calendarday = strftime('%d', $datestr); // 01

$calendarmonthshort = substr($calendarmonth, 0, 3);

// db properties
$dbhost = 'localhost';
$dbuser = '******';
$dbpass = '******';
$dbname = '******';

$salt = '******';

// open db
$conn = mysql_connect ($dbhost, $dbuser, $dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ($dbname);

// get calendar list from database
$query = " SELECT * " .
         " FROM jos_jevents_repetition " .
         " LEFT JOIN jos_jevents_vevent " .
         " ON jos_jevents_repetition.eventid = jos_jevents_vevent.ev_id " .
         " LEFT JOIN jos_jevents_vevdetail " .
         " ON jos_jevents_repetition.eventdetail_id = jos_jevents_vevdetail.evdet_id " .
         " LEFT JOIN jos_categories " .
         " ON jos_jevents_vevent.catid = jos_categories.id " .
         " WHERE '$calendardate' BETWEEN date(startrepeat) AND date(endrepeat) " .
         " ORDER BY hour(startrepeat), minute(startrepeat) ASC ";

$result = mysql_query($query) or die('Error : ' . mysql_error());

echo '<div id="services">';
echo '<div class="title">';
echo '<h3>Services Today</h3>';
echo "<p>".date("l j F Y",$datestr)."</p>\n";
echo '</div>';

echo '<table border="0" cellspacing="0" cellpadding="0" class="calendar">';

while($row = mysql_fetch_array($result))
{
	$id = $row['rp_id'];
	$category = $row['title'];
	$title = $row['summary'];
	$catid = $row['catid'];
	$eventtype = $row['event_type'];
	$start_datestr = strtotime($row['startrepeat']);
	$starthour = strftime('%H', $start_datestr);
	$startminute = strftime('%M', $start_datestr);
	$starttime = $starthour.".".$startminute;

	if ($catid == 7) {
	$category_show = " (Concert)";
	} else {
	$category_show = "";
        }


echo "<tr>";
echo "<td valign=\"top\">" . $starttime . " </td>";
echo "<td valign=\"top\">" .  $title . $category_show ."</td>\n";
echo "</tr>";
}
echo "</table>";

echo '<div class="opening-times">';
echo '<p>The cathedral is open today from</p>';
echo '<h3>08.30 - 17.45</h3>';
echo '</div>';
echo '</div><!-- end services -->';
