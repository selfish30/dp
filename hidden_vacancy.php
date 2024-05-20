<?php
                // Подключение к базе данных MySQL
                $connection = mysqli_connect('localhost', 'hr_admin', 'hr_admin', 'hr');
                // Проверка соединения
                if (!$connection) {
                    die("Ошибка подключения: ". mysqli_connect_error());
                }
                // Получение информации о выбранной вакансии по ее ID
                $vacancy_id = $_GET["vacancy_id"];
                $query = "UPDATE vacancies SET hidden = 1 WHERE id = $vacancy_id";
                $result = $connection->query($query);
                if ($connection->query($query) == TRUE) {
                    echo "<script>location.href='cabinet.php'</script>";
                    $connection->close();
                    exit;
                } else {
                    echo "<script>location.href='cabinet.php'</script>";
                    exit;
                }
                $connection->close();
?>