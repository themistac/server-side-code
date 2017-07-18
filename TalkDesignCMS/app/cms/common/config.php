<?php
// db properties
$dbhost = 'localhost';
$dbuser = '******';
$dbpass = '******';
$dbname = '******';

$salt = '******';

function convert_smart_quotes($string) {
  //converts smart quotes to normal quotes.
  $search = array(chr(145), chr(146), chr(147), chr(148), chr(151));
  $replace = array("\'", "\'", '\"', '\"', '-');
  return str_replace($search, $replace, $string);
}
