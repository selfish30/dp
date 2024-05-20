<?php 
// Подключение к базе данных
$connection = mysqli_connect('localhost', 'hr_admin', 'hr_admin', 'hr');
// Проверка соединения
if (!$connection) {
    die("Ошибка подключения: ". mysqli_connect_error());
}
$login= $_POST['login'];
$password=$_POST['password'];

$query="SELECT * FROM users WHERE login='$login'";
$result= $connection->query($query);

if ($result->num_rows >0) {
	$user= $result->fetch_assoc();
	if (password_verify($password,$user['password'])){
		session_start();
		$_SESSION["user_id"]=$user["id"];
		$_SESSION["role"]=$user["role"];
	}
}

	if (isset($_SESSION["user_id"])){
		$token = true;
	}
	else
	{
		$token=false;
	}
	if ($token){
        echo "<script>location.href='cabinet.php'</script>";
	}else{
		echo '<script>alert("Ошибка входа! Повторите попытку.")</script>';
		echo "<script>location.href='index.php'</script>";
	}
?>