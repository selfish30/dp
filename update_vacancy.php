<?php 
// Подключение к базе данных
$connection = mysqli_connect('localhost', 'hr_admin', 'hr_admin', 'hr');
// Проверка соединения
if (!$connection) {
    die("Ошибка подключения: ". mysqli_connect_error());
}
$id = $_POST['vacancy_id'];
$title = $_POST['title'];
$description = $_POST['dscr'];
$full_dscr = $_POST['full_dscr'];
$cost = $_POST['cost'];


$query = "UPDATE vacancies 
             SET  id = '$id' ,
                  title = '$title' ,
                  dscr = '$description' ,
                  full_dscr = '$full_dscr' ,
                  cost = '$cost' 
           WHERE id = '$id'";
           
if ($connection->query($query) == TRUE) {
    echo '<script>alert("Обновлено!");</script>';
    echo "<script>location.href='vacancy_site.php?vacancy_id=".$id."'</script>";
    exit;
} else {
    echo '<script>alert("Ошибка! Попробуйте еще раз.")</script>'. $connection->error;
    echo "<script>location.href='vacancy_site.php?vacancy_id=".$id."'</script>";
    exit;
}

?>