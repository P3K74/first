<?php session_start(); 
header('Content-Type: text/html; charset=utf-8');
 $CurentLang = addslashes($_SESSION['NowLang']);
  include_once ("lang/lang.".$CurentLang.".php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   </head>
   <body>
    <input type="button" value="<?php echo $Lang['main']; ?>" onclick='window.location="index.php"'/></p>
   </div>
<?php
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");

     echo('<form action="" method="post">');
	 	 
	 $login=isset($_POST['login']) ? $_POST['login'] : NULL;
	 $email=isset($_POST['email']) ? $_POST['email'] : NULL;
	 $password=isset($_POST['password']) ? $_POST['password'] : NULL;
	 $twopassword=isset($_POST['twopassword']) ? $_POST['twopassword'] : NULL;
	 echo ('
	 <table>
      <tr>
		 <td> * <input type="text" name="login" value="'.$login.'" /> - '.$Lang['enter_login'].'<br/></td></tr>
	 <tr>
		 <td> * <input type="text" name="email" value="'.$email.'" /> - '.$Lang['enter_mail'].'<br/></td></tr>
	 <tr>
		 <td> * <input type="password" name="password" /> - '.$Lang['enter_pass'].'<br/></td></tr>
	 <tr>
		 <td> * <input type="password" name="twopassword" /> - '.$Lang['replay_pass'].' <br/></td></tr>
	 <tr>
	     <td> <input type="submit" name="button" value="'.$Lang['registration'].'"/></td></tr>
	 </table>
	 </form>');
	 
   include ('conf.php');
   $STH=$DBH->query("select login from users where login=\"$login\"");
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   $login_variable = $STH->fetch();
   
   $STH=$DBH->query("select email from users where email=\"$email\"");
   $STH->setFetchMode(PDO::FETCH_ASSOC);
   $mail_variable = $STH->fetch();
  
   if (empty($login)and empty($email)and empty($password) and  empty($twopassword))
     {
        $error=$Lang['err1'];
     }
      else
        {  
	     if (empty($login))
        {
        $error=$Lang['enter_login'];
        }
     elseif($login_variable>0)
        {
	    $error=$Lang['err5'];
	    }
   
     elseif (empty($email))
        {
        $error=$Lang['err6'];
        }
     elseif(!preg_match("/^[_\.0-9a-z-]{1,}@[_\.0-9a-z-]{1,}\.[_\.0-9a-z-]{2,}$/",$email))
        {
	   $error=$Lang['err7'];
	    }
     elseif($mail_variable>0)
        {
	     $error=$Lang['err8'];
	    }
	 
      elseif (empty($password))
        {
        $error=$Lang['err9'];
        }
      elseif(strlen($login)<5 or strlen($login)>20)
	    {
	   $error=$Lang['err10'];
	    }   
      elseif(strlen($password)<6 or strlen($password)>20)
        {
	   $error=$Lang['err11'];
	    }
      elseif(!preg_match("/^[0-9a-zA-z]+$/",$password))
        {
	   $error=$Lang['err12'];
	    }
	 
      elseif (empty($twopassword))
        {
        $error=$Lang['err13'];
        }
      elseif($twopassword!=$password)
        {
	   $error=$Lang['err14'];
	    }
	   	}
echo "<p>".$error."</p>";		
   if(empty($error) and isset($_POST['button']))
      {
	    $STH=$DBH->query("INSERT INTO users VALUES ('$login','$email','$password', '', '','')");
		echo '<script>location.href="uspih.php";</script>';
	  }
?>
</body>
</html>