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

?>