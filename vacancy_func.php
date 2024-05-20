<?php
// Подключение к базе данных MySQL
$connection = mysqli_connect('localhost', 'hr_admin', 'hr_admin', 'hr');
// Проверка соединения
if (!$connection) {
        die("Ошибка подключения: ". mysqli_connect_error());
}
        
if (!isset($_SESSION['user_id'])):

        // Функция для отображения списка вакансий на  странице с вакансиями
            function mainvacancy() {
                // Вывод панели навигации
                global $connection;
                $query = "SELECT * FROM vacancies where hidden != 1 ";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    // Вывод списка вакансий в виде карточек
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="card" style="width: 18rem">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">'.$row["title"].'</h5>';
                        echo '<p class="card-text">'.$row["dscr"].'</p>';
                        echo '<p class="card-text">'.$row["cost"].' р.</p>';
                        echo '<a href="vacancy_site.php?vacancy_id=' . $row["id"] . '" class="btn btn-primary">Подробнее</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    } else {
                        echo "Нет доступных вакансий.";
                    }
                $connection->close();
                exit;
            }
else: 
  
            function mainvacancy() {
                // Вывод панели навигации
                global $connection;
                $query = "SELECT * FROM vacancies";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    // Вывод списка вакансий в виде карточек
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="card" style="width: 18rem">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">'.$row["title"].'</h5>';
                        if($row["hidden"] == 1) {
                            echo '<h7 class="card-title"> Скрыто </h7>';
                        } else {
                        }
                        echo '<p class="card-text">'.$row["dscr"].'</p>';
                        echo '<p class="card-text">'.$row["cost"].' р.</p>';
                        echo '<a href="vacancy_site.php?vacancy_id=' . $row["id"] . '" class="btn btn-primary">Подробнее</a>';
                        if($row["hidden"] == 1) {
                            echo '<a href="unhidden_vacancy.php?vacancy_id=' . $row["id"] . '" class="btn btn-primary">Открыть</a>';
                        } else {
                            echo '<a href="hidden_vacancy.php?vacancy_id=' . $row["id"] . '" class="btn btn-primary">Cкрыть</a>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                    } else {
                        echo "Нет доступных вакансий.";
                    }
                    $connection->close();
                    exit;
            }
endif;
?>