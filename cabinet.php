<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="stylesheets.css">
        <link rel="stylesheet" href="cards.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>HR-портал МТУ</title>
    </head>
    <body>
        <div class="container-fluid">
            <?php 
                include "header.php"
            ?>
            <div>
        <div class="container-fluid">
              <h1>Новые отклики</h1>
              <div class="cards-wrapper">
              <?php 
                    include "resume.php";
                    new_resume();
                ?>
            </div>
        </div>
        </div>
        <div class="container-fluid">
                <h1>Вакансии</h1>
                <div class="cards-wrapper">
                <?php include "vacancy_func.php";
                    mainvacancy();
                ?>
            </div> 
        </div>
    </body>
</html> 