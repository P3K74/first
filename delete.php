<?php 
   include 'conf.php';
   $id=$_GET['id'];	
   $STH=$DBH->query("DELETE FROM materials WHERE id=\"$id\"");

   echo "<script>location.href='index.php'</script>"
?>