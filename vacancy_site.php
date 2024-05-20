<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="stylesheets.css" >
            <link rel="stylesheet" href="cards.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <title>HR-портал МТУ</title>
    </head>
    <body>
        <div class="container-fluid">
            <?php include "header.php" ?> 
            <?php
                // Подключение к базе данных MySQL
                $connection = mysqli_connect('localhost', 'hr_admin', 'hr_admin', 'hr');
                // Проверка соединения
                if (!$connection) {
                    die("Ошибка подключения: ". mysqli_connect_error());
                }
                // Получение информации о выбранной вакансии по ее ID
                $vacancy_id = $_GET["vacancy_id"];
                $query = "SELECT * FROM vacancies WHERE id = $vacancy_id";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                // Вывод информации о вакансии и формы для отправки резюме
                while($row = $result->fetch_assoc()) {
                    //// Отображение для не авторизированных
                    if (!isset($_SESSION['user_id'])):
                        ///// Описание
                                echo '<div class="form-outline mb-4">';
                                echo '<label for="title" class="form-label">Наименование:</label>';
                                echo '<textarea class="form-control" rows="1" id="title" name="title" readonly>'.$row["title"].'</textarea>';
                                echo '<label for="description" class="form-label">Краткое описание:</label>';
                                echo '<textarea class="form-control" rows="1" id="dscr" name="dscr" readonly>'.$row["dscr"].'</textarea>';
                                echo '<label for="full_dscr" class="form-label">Полное описание:</label>';
                                echo '<textarea class="form-control" rows="6" id="full_dscr" name="full_dscr" readonly>'.$row["full_dscr"].'</textarea>';
                                echo '<label for="cost" class="form-label">Заработная плата:</label>';
                                echo '<textarea class="form-control" rows="1" id="cost" name="cost" readonly>'.$row["cost"].'</textarea>';
                                echo '</div>';
                        //// Форма для отправки резюме
                                echo '<div>';
                                echo '<h6 for="title" class="form-label">Откликнуться</h6>';
                                echo '<form action="submit_resume.php" method="post" class="form-outline mb-4" enctype="multipart/form-data">';
                                echo '<input type="hidden" name="vacancy_id" value="' . $row["id"] . '">';
                                echo '<label for="name" class="form-label">Имя:</label>';
                                echo '<input type="text" name="name" id="name" class="form-control">';
                                echo '<label for="email" class="form-label">Email:</label>';
                                echo '<input type="email" name="email" id="email" class="form-control">';
                                echo '<label for="tel" class="form-label">Телефон:</label>';
                                echo '<input type="tel" name="tel" id="tel" class="form-control" pattern="[7]{1}[0-9]{3}[0-9]{3}[0-9]{4}" required />';
                                echo '<label for="file" class="form-label">Резюме:</label>';
                                echo '<input type="file" name="file" id="file" class="form-control" required >';
                                echo '<input type="submit" value="Откликнуться">';
                                echo '</form>';
                                echo '</div>';
                    else:
                        //// Отображение для авторизированных
                                echo '<div>';
                                echo '<form action="update_vacancy.php" method="post" class="form-outline mb-4">';
                                echo '<input type="hidden" name="vacancy_id" value="' . $row["id"] . '"><br>';
                                echo '<label for="title" class="form-label">Наименование:</label>';
                                echo '<textarea class="form-control" rows="1" id="title" name="title">'.$row["title"].'</textarea>';
                                echo '<label for="description" class="form-label">Краткое описание:</label>';
                                echo '<textarea class="form-control" rows="1" id="dscr" name="dscr">'.$row["dscr"].'</textarea>';
                                echo '<label for="full_dscr" class="form-label">Полное описание:</label>';
                                echo '<textarea class="form-control" rows="6" id="full_dscr" name="full_dscr">'.$row["full_dscr"].'</textarea>';
                                echo '<label for="cost" class="form-label">Заработная плата:</label>';
                                echo '<textarea class="form-control" rows="1" id="cost" name="cost">'.$row["cost"].'</textarea>';
                                echo '<input type="submit" value="Обновить вакансию">';
                                echo '</form>';
                                echo '</div>';
                    endif;
                }
                } else {
                echo "Вакансия не найдена.";
                }
                //// Отображение откликов для автоматизированных
                if (isset($_SESSION['user_id'])):
                    include "resume.php";
                    echo '<div class="container-fluid">';
                    echo '<h6>Новые отклики</h6>';
                    echo '<div class="cards-wrapper">';
                    new_resume($vacancy_id);
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="container-fluid">';
                    echo '<h6>Просмотренные отклики</h6>';
                    echo '<div class="cards-wrapper">';
                    old_resume($vacancy_id);
                    echo '</div>';
                    echo '</div>';
                endif;
            ?>
        </div>
    </body>
</html>