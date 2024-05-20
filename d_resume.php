<?php
    // Подключение к базе данных MySQL
    $connection = mysqli_connect('localhost', 'hr_admin', 'hr_admin', 'hr');
    // Проверка соединения
    if (!$connection) {
            die("Ошибка подключения: ". mysqli_connect_error());
    }
    $row_id = $_GET["row_id"];
    // SQL запрос для получения файла
    $sql = "SELECT name_f , type_f , content_f FROM resumes WHERE row_id=$row_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Отправка файла на скачивание
    header("Content-type: " . $row['type_f']);
    header("Content-Disposition: attachment; filename=" . $row['name_f']);
    echo $row['content_f'];
    $query = $connection->query("UPDATE resumes SET view = 1 WHERE row_id=$row_id");
    $connection->close();
    ///echo "<sripts>window.location.reload()</sripts>";
    } else {
    echo "Файл не найден";
    $connection->close();
    }
?>