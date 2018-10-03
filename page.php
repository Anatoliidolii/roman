<?session_start();
echo 'Привет '.$_SESSION['login'].'<br>'.'<hr>'."Твой идентификатор: ".$_SESSION['id'];
if($_SESSION['auth']==1){

?>
<head>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<br>
<br>

<form method="get" action="">
	<input type="text" name="coment" placeholder="Добавить запись в базу данных" size="40px">
	<input type="submit" value="Добавить запись">
	<input type="reset" value="Очистить">
</form>

</body>



<?
if(trim(!empty($_GET['coment']))){//добавляем записть, если не пустое поле
	
	$data_add=date("Y.m.d");
	$id=$_SESSION['id'];
	$value=$_GET['coment'];
	

	require_once 'conect.php';

		$link = mysqli_connect($host, $user, $passwordDB, $database) or die("Ошибка " . mysqli_error($link));

     $query=" INSERT INTO post VALUES (null, '$id', '$value', '$data_add')";

  	   $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
  	   	$res='Запись удачно добавлена в личный блог'.'<br>';
  	   
  	    echo $res;
  	    $value=0;

	} else {
		echo 'Пустое поле, не можем добавить запись'.'<br>';

	}
	

?>

<div class="blog">

<br>

  	   <?}
  	 
if ($_SESSION['auth']==1) {
	if (isset($_GET['react'])) {
		session_destroy();
	}
if(isset($res)){
		require_once 'conect.php';

		$link = mysqli_connect($host, $user, $passwordDB, $database) or die("Ошибка " . mysqli_error($link));

		$what = "SELECT COUNT(*) as count FROM post WHERE id ='$id'";
		$what1=mysqli_query($link, $what) or die("Ошибка " . mysqli_error($link));//количество записей в таблице
		$what1=mysqli_fetch_assoc($what1);
		$what2=implode($what1);
		echo "Записей в блоге: ".$what2.'<br>';


			$str="SELECT a FROM post WHERE id='$id'";
			$rrr=mysqli_query($link,$str) or die("Ошибка " . mysqli_error($link));
			$strev=mysqli_fetch_assoc($rrr);
			$strev=implode($strev);
			//echo $strev.'<br>'.'<hr>';  




			while ($nomer<$what2) {


				     $query="SELECT tex,date_add FROM post WHERE id ='$id' and a='$strev' ";

  	 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)) ; //записи из таблицы

  	 $use=mysqli_fetch_assoc($result);

  	 $nomer=$nomer+1;

  	 $strev=$strev+1;
  	 
?>
	

	<h4><? echo $nomer.') '. $use['tex'] ?><h4>
	<h6> <? echo $use['date_add']; ?><h6><hr>

  	   
  	 <?//	 if(isset($_GET['delete'])){

  	 

  	 //'<div class="coment"> Опубликовано '.$use['date_add'].'<br></div>'.'<br>';
//утром добавить кнопку удаленмя записи

}
			}









} else{?>



<link rel="stylesheet" type="text/css" href="css/dva.css">
<div class="hello"> <h3>Вы не авторизированы</h3>
<h4><a href="index.php">Зарегестрироваться</a></h4>
<h4> <a href="autoriz.php">Авторизироваться</a><h4></div>



<?
} 	  
if($_SESSION['auth']==1){
?>

	<form method="get">
		<div class="react"><input type="submit" name="react" value="Выйти"></div>
	</form>
	
</div>


<?
}//сделать так, чтобы записи отображались даже когда поле пустое
// все таки решить проблему с отобраением записей
//оформление
//к страничке авторизации добавить регистрацию
//добавить иконку маленькую вверх браузера
//разобраться с загрузкой картинок
//и самое важное, оптимизировать код
/*а дельше учить массивы, плотно работать с массивами




*/

