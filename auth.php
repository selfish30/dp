<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Вход</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="stylesheets.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	
	<div class="container-fluid">
		<?php include "header.php" ?>
		<?php 
			if (!isset($_SESSION['user_id'])): ?> 
				<div class="row text-center">
					<div class="col-4 offset-4">
					<h1>Авторизация</h1>
					<form action="authsubmit.php" method="post">
						<div>
							<label for="login" class="form-label ">Логин</label>
							<input required class="form-control" type="text" name="login">
						</div>
						<div>
							<label for="password" class="form-label">Пароль</label>
							<input required class="form-control" type="password" name="password">
						</div>
						<button type="submit" class="btn btn-success">Вход</button>
					</form>
					</div>
				</div>
		<?php else: ?>
			<script>location.href='cabinet.php'</script>;
		<?php endif; ?>
	</div>
</body>
</html>