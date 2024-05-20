<?php
// Подключение к базе данных MySQL
$connection = mysqli_connect('localhost', 'hr_admin', 'hr_admin', 'hr');
// Проверка соединения
if (!$connection) {
        die("Ошибка подключения: ". mysqli_connect_error());
}

function new_resume($vacancy_id="") {
    // Вывод панели навигации
    global $connection;
    if (empty($vacancy_id)) {
        $query = "SELECT * FROM resumes r JOIN vacancies v on v.id = r.vacancy_id where view = 0";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            // Вывод списка вакансий в виде карточек
            while($row = $result->fetch_assoc()) {
                echo '<div class="card" style="width: 18rem">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$row["title"].'</h5>';
                echo '<p class="card-text">'.$row["name"].'</p>';
                echo '<p class="card-text">'.$row["email"].'</p>';
                echo '<p class="card-text">'.$row["phone"].'</p>';
                echo '<a href="d_resume.php?row_id=' . $row["row_id"] . '" class="btn btn-primary">Скачать резюме</a>';
                echo '</div>';
                echo '</div>';
            }
            } else {
                echo "Нет новых откликов.";
            }
        } else {
            $query = "SELECT * FROM resumes r JOIN vacancies v on v.id = r.vacancy_id where view = 0 and id = $vacancy_id";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                // Вывод списка вакансий в виде карточек
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card" style="width: 18rem">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.$row["title"].'</h5>';
                    echo '<p class="card-text">'.$row["name"].'</p>';
                    echo '<p class="card-text">'.$row["email"].'</p>';
                    echo '<p class="card-text">'.$row["phone"].'</p>';
                    echo '<a href="d_resume.php?row_id=' . $row["row_id"] . '" class="btn btn-primary">Скачать резюме</a>';
                    echo '</div>';
                    echo '</div>';
                }
                } else {
                    echo "Нет новых откликов.";
                }
            }
        }
function old_resume($vacancy_id="") {
    // Вывод панели навигации
    global $connection;
    if (empty($vacancy_id)) {
        $query = "SELECT * FROM resumes r JOIN vacancies v on v.id = r.vacancy_id where view = 1";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            // Вывод списка вакансий в виде карточек
            while($row = $result->fetch_assoc()) {
                echo '<div class="card" style="width: 18rem">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$row["title"].'</h5>';
                echo '<p class="card-text">'.$row["name"].'</p>';
                echo '<p class="card-text">'.$row["email"].'</p>';
                echo '<p class="card-text">'.$row["phone"].'</p>';
                echo '<a href="d_resume.php?row_id=' . $row["row_id"] . '" class="btn btn-primary">Скачать резюме</a>';
                echo '</div>';
                echo '</div>';
            }
            } else {
                echo "Нет откликов.";
            }
        } else {
            $query = "SELECT * FROM resumes r JOIN vacancies v on v.id = r.vacancy_id where view = 1 and id = $vacancy_id";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                // Вывод списка вакансий в виде карточек
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card" style="width: 18rem">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.$row["title"].'</h5>';
                    echo '<p class="card-text">'.$row["name"].'</p>';
                    echo '<p class="card-text">'.$row["email"].'</p>';
                    echo '<p class="card-text">'.$row["phone"].'</p>';
                    echo '<a href="d_resume.php?row_id=' . $row["row_id"] . '" class="btn btn-primary">Скачать резюме</a>';
                    echo '</div>';
                    echo '</div>';
                }
                } else {
                    echo "Нет откликов.";
                }
            }
        }
        

?>