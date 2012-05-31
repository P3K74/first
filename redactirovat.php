<?
   include ('conf.php');	
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");

if(!empty($_SESSION['login'])){
   $login=$_SESSION['login'];
   $STH=$DBH->query("SELECT * FROM users WHERE login ='$login'");
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   $row = $STH->fetch();
   $picture=$row["avatar"];
   $role=$row['role'];
   if(!empty($row["avatar"])){
echo '<img src="'.$picture.'" alt="My foto"/>';}}

if(!empty($_SESSION['login'])){
   echo "<br/><a href='load.php'>".$Lang['edit']."</a>";
   echo "<br/><a href='add.php'>".$Lang['add']."</a>"; 
   echo "<br/><a href='watch.php'>".$Lang['watch']."</a><p>"; ?>

   <input type="button" value="<?php echo $Lang['out']; ?>" onclick='window.location="out.php"'/></p>
<?php }
?>
