<?php session_start(); 
header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   </head>
   <body>

   <?php
if(isset($_SESSION['login'])){
   $login=$_SESSION['login'];
   include ('conf.php');	
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");
   $surname=$_POST['surname'];
   $name=$_POST['name'];
   if(!empty($surname) and !empty($name)){
   $STH=$DBH->query("UPDATE users set surname=\"$surname\"");
   $STH=$DBH->query("UPDATE users set name=\"$name\"");

   $STH=$DBH->query("SELECT * FROM users");
   
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   $row = $STH->fetch();
   echo "<p>".$ad_n_s." ";
   echo $surname;
   echo " ".$name."<br/></p>";}
   
   
   $images='images/';	
   $maxsize=1024*3*1024;
   
   $error="";
if(!empty($_FILES['avatar']['name'])){	  
if($_FILES['avatar']['size']>$maxsize){
      $error="<b>error in size</b><br/><br/>";
	  unlink($_FILES['avatar']['tmp_name']);}
	  
if($_FILES['avatar']['type']!='image/gif' and
	   $_FILES['avatar']['type']!='image/pjpeg' and
	   $_FILES['avatar']['type']!='image/jpeg' and
	   $_FILES['avatar']['type']!='image/png'){
	   $error="<b>choose correct format: GIF, JPEG, PNG</b><br/><br/>";
	   unset($_FILES['avatar']['tmp_name']);}
	   
	  echo $error;
	   
if(!$error)
{
    $filename=$_FILES['avatar']['name'];
    $source=$_FILES['avatar']['tmp_name']; 
    $target=$images . $_FILES['avatar']['name'];
    move_uploaded_file($source,    $target);
	
     if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/',$filename))
     {
      $im=imagecreatefromjpeg($images.$filename);
     }
	 
	 if(preg_match('/[.](GIF)|(gif)$/',$filename))
     {
      $im=imagecreatefromgif($images.$filename);
     }
	 
	 if(preg_match('/[.](PNG)|(png)$/',$filename))
     {
      $im=imagecreatefrompng($images.$filename);
     }
	 
	$w_src=imagesx($im);
	$h_src=imagesy($im);
	$koe=$w_src/200;
    $new_h=ceil ($h_src/$koe);
	$dest = imagecreatetruecolor(200,$new_h);
	
	ImageCopyResampled ($dest, $im, 0, 0, 0, 0, 200, $new_h, $w_src, $h_src);
	
	$BD="images/".time().".jpg";
	$avatar=imagejpeg($dest, $BD);
	
	$delfull=$images.$filename; 
    unlink($delfull);
	
   $STH=$DBH->query("UPDATE users set avatar=\"$BD\" WHERE login=\"$login\"");
	
   $STH=$DBH->query("SELECT * FROM users WHERE avatar = \"$BD\"");

    $STH->setFetchMode(PDO::FETCH_ASSOC);
   $row = $STH->fetch();
       ?> <p><img src="<?php echo $BD; ?>" alt="my photo"/> <?php }
   echo "<br/><a href='index.php'>" .index. "</a></p>";}}
?>
</body>
</html>