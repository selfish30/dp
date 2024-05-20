<?php
// Подключение к базе данных
$connection = mysqli_connect('localhost', 'hr_admin', 'hr_admin', 'hr');
// Проверка соединения
if (!$connection) {
    die("Ошибка подключения: ". mysqli_connect_error());
}
// Получение данных из формы
$vacancy_id = $_POST["vacancy_id"];
$name = $_POST["name"];
$email = $_POST["email"];
$tel = $_POST["tel"];
// Проверяем, был ли загружен файл
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    
    // Читаем содержимое файла
    $fp = fopen($file_tmp, 'r');
    $content = fread($fp, filesize($file_tmp));
    $content = addslashes($content);
    fclose($fp);

// Проверка ранее отправленного резюме
$check = "SELECT 1 as rn FROM resumes WHERE vacancy_id = $vacancy_id and email = '$email' and phone = $tel";
$result = $connection->query($check)->fetch_assoc();
// echo $inc_f["id"];
if ($result['rn'] == '1') {
    $query= "UPDATE resumes 
                SET name_f = '$file_name' ,
                    type_f = '$file_type' ,
                    content_f = '$content' 
              WHERE vacancy_id = $vacancy_id 
                    and email = '$email' 
                    and phone = $tel";
        if ($connection->query($query) == TRUE) {
            echo '<script>alert("Резюме обновлено!");</script>';
            echo "<script>location.href='index.php'</script>";
            $connection->close();
            exit;
        } else {
            echo '<script>alert("Ошибка в отправке резюме! Попробуйте еще раз.")</script>'. $connection->error;
            echo "<script>location.href='vacancy_site.php?vacancy_id=".$vacancy_id."'</script>";
            exit;
        }
    } else {
        // Подготовка и выполнение запроса на вставку данных в базу данных
        $query= "INSERT INTO resumes (vacancy_id, name, email, phone, name_f , type_f , content_f ) VALUES ('$vacancy_id','$name', '$email', '$tel', '$file_name', '$file_type', '$content')";
        if ($connection->query($query) == TRUE) {
            echo '<script>alert("Резюме успешно отправлено!")</script>';
            echo "<script>location.href='index.php'</script>";
            exit;
        } else {
            echo '<script>alert("Ошибка в отправке резюме! Попробуйте еще раз.")</script>'. $connection->error;
            echo "<script>location.href='vacancy_site.php?vacancy_id=".$vacancy_id."'</script>";
            exit;
        }
}
// Закрытие подключения к базе данных
$connection->close();
?>