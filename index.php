<?session_start();
if($_SESSION['auth']==1){
	echo "вы уже авторизованы";
}

if(empty(trim($_GET['login1']))||empty(trim($_GET['pass1']))||empty(trim($_GET['pass2']))){
	echo 'Логин или пароль не могyт быть пустыми';
}else{
	if($_GET['pass1']==$_GET['pass2']){
		//echo 'Можем добавить новую запись в базу данных'.'<br>';

		$date_today=date("Y.m.d");
		$login=$_GET['login1'];
		$pass=md5($_GET['pass1']);


		require_once 'conect.php';

		$link = mysqli_connect($host, $user, $passwordDB, $database) or die("Ошибка " . mysqli_error($link));

     $query="INSERT INTO user (id, login, pass, dates) VALUES (NULL, '$login', '$pass', '$date_today')";

  	   $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
  	    header('Location: autoriz.php');

	} else {
		echo 'Пароли не совпадают';
	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация в личном блоге</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<div class="logation">
<h2>Регистрация</h2>
<form method="GET" action="">
	<input name="login1" type="text" placeholder="Введите логин"><br><br>
	<input name="pass1" type="password" placeholder="Пароль">
	<input name="pass2" type="password" placeholder="Подтверждение пароля"><br>
	Уже зарегистрировались? <a href="autoriz.php">Войти</a><br>
	<input type="submit" value="Зарегистрироваться"><br>



</form>
</div>

</body>
</html>