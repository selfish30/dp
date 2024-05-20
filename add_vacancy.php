<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="stylesheets.css" >
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <title>HR-портал МТУ</title>
    </head>
    <body>
        <div class="container-fluid">
            <?php include "header.php" ?> 
             <form action="add_vacancysbmt.php" method="post" class="form-outline mb-4">
             <label for="title" class="form-label">Наименование:</label>
             <textarea class="form-control" rows="1" id="title" name="title"></textarea>
             <label for="description" class="form-label">Краткое описание:</label>
             <textarea class="form-control" rows="1" id="dscr" name="dscr"></textarea>
             <label for="full_dscr" class="form-label">Полное описание:</label>
             <textarea class="form-control" rows="6" id="full_dscr" name="full_dscr"></textarea>
             <label for="cost" class="form-label">Заработная плата:</label>
             <textarea class="form-control" rows="1" id="cost" name="cost"></textarea>
             <input type="submit" value="Опубликовать">
             </form>
    </body>
</html> 
            