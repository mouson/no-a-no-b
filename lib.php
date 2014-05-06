<?php

function qMysql($str){
   $link = mysql_connect("localhost", "nanb", "nanb");
   if (!$link) {
    die('Could not connect: ' . mysql_error());
   }
   mysql_select_db("nanb", $link) or die(mysql_error());
   mysql_query("SET NAMES 'utf8'"); 
   mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
   mysql_query("SET CHARACTER_SET_RESULTS=utf8"); 
   $result = mysql_query($str, $link) or die(mysql_error());
   mysql_close($link);
   return $result;
}

function date2before($val)
{
 $diff = time() - $val;

 if ($diff < 0) {
 return '不久的將來';
 } elseif ($diff < 60) {
 return $diff . '秒前';
 } elseif ($diff < 3600) {
 return floor($diff/60) . '分鐘前';
 } elseif ($diff < 86400) {
 return floor($diff/3600) . '小時前';
 } elseif ($diff < 604800) {
 return floor($diff/86400) . '天前';
 } else {
 return floor($diff/604800) . '週前';
 }
}

?>