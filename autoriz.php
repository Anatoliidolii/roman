<?
if(empty($_GET['login'])||empty($_GET['pass1'])){
	echo "Логин или пароль не могyт быть пустыми";
}else{
	

	
$login=$_GET['login'];




$password=md5($_REQUEST['pass1']);	

require_once 'conect.php';

		$link = mysqli_connect($host, $user, $passwordDB, $database) or die("Ошибка " . mysqli_error($link));

     $query="SELECT login,id FROM user WHERE login = '$login' and pass = '$password'";
     
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
     
  
  	   $user=mysqli_fetch_assoc($result);
    
  	   if(!empty($user)){
  	  	session_start();
  	    $_SESSION['auth']=true;
  	    $_SESSION['id']=$user['id'];
  	   	$_SESSION['login']=$user['login'];
  	   	$_SESSION['dates']=$user['dates'];
        
        
  	   header('Location: page.php ' );

  	   }else{echo 'Логин или пароль введены не верно';
  	}
  

}

/*
     if($query===NULL){
  	}
  	else {echo 'no';}

if ($_GET['login1']==12) {
	echo 'lol';
}else{
	echo 'rrrrr';
}*/
?>
<head>
	<title>Авторизация в личном блоге</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<div class="logation">
<h2>Aвторизация</h2>
<form method="GET" action="">
	<input name="login" type="text" placeholder="Введите логин"><br><br>
	<input name="pass1" type="password" placeholder="пароль"><br><br>
	<input type="submit" value="Войти"><br>


</form>
</div>



</body>
</html>