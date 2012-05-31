<?php if(empty($_SESSION['login'])){ ?>
<?php

   $self=htmlentities($_SERVER['PHP_SELF']);
   $login=isset($_POST['login'])?$_POST['login']:NULL;
   $password=isset($_POST['password'])?$_POST['password']:NULL;
   $error='';

  $CurentLang = addslashes($_SESSION['NowLang']);
  include_once ("lang/lang.".$CurentLang.".php"); 
      ?>
   <form action="" method="post">
	   <p><input type="text" name="login" value="<?php echo $login; ?>"/><?php echo " ".$Lang['enter_login']; ?></p>
	   <p><input type="password" name="password"/><?php echo " ".$Lang['enter_pass']; ?></p>
	   <p><input type="submit" value="<?php echo $Lang['enter']; ?>"/>
	   <input type="button" value="<?php echo $Lang['registration']; ?>" onclick='window.location="form.php"'/></p>
	 </form>
   <?php
   
		include ('conf.php');
   $STH=$DBH->query("SELECT * FROM users where login=\"$login\" and password=\"$password\"");

   $STH->setFetchMode(PDO::FETCH_ASSOC);
   $row = $STH->fetch();   
   if (empty($row['login']))
    {
    $error =$Lang['err15']."<br/>";
    }
   else{
    if($login==$row['login'] or $login==$row['email'])  {
	$_SESSION['login']=$login;
	echo '<script>location.href="index.php";</script>';
    }
	else{
	$error =$Lang['err15']."<br/>";
    }}if ($login=='' or $password=='')
      {
	     $error = $Lang['err16']."<br/>";
	  }
	  if($error){echo $error;}
	  ?> </div> <?php
}
?>
