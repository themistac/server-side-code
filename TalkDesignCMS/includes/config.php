<?php
// db properties
$dbhost = 'localhost';
$dbuser = 'talkde39_talkdbu';
$dbpass = 'Lwa0XmX+yXq;';
$dbname = 'talkde39_talk';

$salt = 'di548gt_vsdmi-934iovfw93';

function show_keywords($string) {
$find = array(" ", "/", ",", "'", "(", ")", "?", "&eacute;", ":", "&", "!", "%", ".", "?p=");
$replace_with = array("-", "-", "", "", "", "", "", "e", "", "and" ,"", "percent", "", "");
$keywords = strtolower(str_replace($find,$replace_with,$string));
$keywordsagain = strtolower(str_replace("---","-",$keywords));
return $keywordsagain;
}

?>