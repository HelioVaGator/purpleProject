<?php
$db_host="localhost";
 $db_username="root";
 $db_pass="hvgiitr";
 $db_name="hvg";
 
 //@mysql_connect("$db_host"," $db_username","$db_pass") or die("couldn't connect to database");
 $db=mysql_connect($db_host,$db_username,$db_pass) ;
 if(!$db){
 echo "couldn't connect to database";
 }
 mysql_select_db($db_name) ;
 //echo "successfl connection";

 ?>
