<?php 
            // Подключение к базе данных
            $connection = mysqli_connect('localhost', 'hr_admin', 'hr_admin', 'hr');
            // Проверка соединения
            if (!$connection) {
                die("Ошибка подключения: ". mysqli_connect_error());
            }
            
            $title = $_POST['title'];
            $description = $_POST['dscr'];
            $full_dscr = $_POST['full_dscr'];
            $cost = $_POST['cost'];

            $query = "INSERT INTO vacancies (title  , dscr , full_dscr , cost ) values ('$title' , '$description' , '$full_dscr' , '$cost')";
            if ($connection->query($query) == TRUE) {
                $res = $connection->query("SELECT max(id) as id FROM vacancies")->fetch_assoc();
                echo "<script>location.href='vacancy_site.php?vacancy_id=".$res['id']."'</script>";
                $connection->close();
                exit;
            } else {
                $connection->close();
                exit;
            }
            ?>