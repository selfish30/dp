<?php session_start();
if (!isset($_SESSION['user_id'])): ?> 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">MTU</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Главная <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vacancy.php">Вакансии</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="auth.php">Авторизация</a>
      </li>
    </ul>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<?php else: ?> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">MTU</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Главная <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cabinet.php">Кабинет HR</a>
      </li>
    </ul>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<form action="add_vacancy.php" method="post">
				<button type="submit" value="Добавить вакансию" class="btn btn-success">Добавить вакансию</button>
			</form>
  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<form action="exit.php" method="post">
				<button type="submit" value="Выйти" class="btn btn-success">Выйти</button>
			</form>
  </div>
</nav>
<?php endif; ?>