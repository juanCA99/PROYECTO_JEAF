<?php 
// datos para la coneccion a mysql 
define('DB_SERVER','localhost'); 
define('DB_NAME','db_blog'); 
define('DB_USER','root'); 
define('DB_PASS',''); 

$con = mysql_connect('localhost','root',''); 
mysql_select_db('db_blog',$con); 
?>