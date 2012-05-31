<?php
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");

   include ('conf.php');
 $STH=$DBH->query("select * from materials");
 $STH->setFetchMode(PDO::FETCH_ASSOC);
   while($row = $STH->fetch()) {   
   $title=$row["title"];
   $txtArea=$row["textArea"];
   $id=$row['id'];
   $titleeng=$row['titleeng'];
   $textareaeng=$row['textareaeng'];
   
   
  if ($_SESSION['NowLang']=='ua'){
   echo '<a href="materials.php?id='.$id.'"> '.$title.'</a></div><br/>';
	  if (strlen($txtArea)>150)
  {
      $txtArea = substr ($txtArea, 0,strpos ($txtArea, " ", 150));
	  echo $txtArea." ... ".'<a href="materials.php?id='.$id.'"> Прочитати</a><br/>'."<br/><br/>";
  }
  else echo $txtArea;
   }
   
   
     else { 
      echo "<div class='node_title'>"; echo '<a href="materials.php?id='.$id.'"> '.$titleeng.'</a></div><br/>';
	  if (strlen($textareaeng)>150)
        {
        $textareaeng = substr ($textareaeng, 0,strpos ($textareaeng, " ", 150));
	    echo $textareaeng." ... ".'<a href="materials.php?id='.$id.'"> Read more</a><br/>'."<br/><br/>";
        } 
      else echo $textareaeng;
                                  }}
?>
