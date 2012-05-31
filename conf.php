<?php
   $domain='http://four.ua/';
   $host="localhost";
   $dbname="petrobd";
   $user="root";
   $pass="";
   try 
    {   
     $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }  
   catch(PDOException $e) 
     {  
    echo $e->getMessage();
	}
?>