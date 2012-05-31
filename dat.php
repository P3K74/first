<?php
 include ('conf.php');

$rows = $DBH->exec("INSERT INTO users2 (login,password) VALUES('login','password')");
if ($rows) {echo "table is already exist";}
else{
$rows = $DBH->exec("CREATE TABLE `users2`(
	login VARCHAR(20) NOT NULL,
	email VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	surname VARCHAR(20) NOT NULL,
	name VARCHAR(50) NOT NULL,
	avatar VARCHAR(50) NOT NULL)");
echo '<center><p><b>Table created!</b></p></center>';
}
 ?>