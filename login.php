<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === '' || $password === '') {
        header('Location: login.php?error=2');
        exit;
    }
	else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) < 8) {
            header('Location: login.php?error=3');
            exit;
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: login.php?error=4');
            exit;
        }
        elseif (strlen($password) < 8) {
            header('Location: login.php?error=5');
            exit;
        }
    }

    if ($email === 'g221210059@sakarya.edu.tr' && $password === 'g221210059') {
        header('Location: login-kontrol.php?error=0');
        exit;
    }
	else {
        header('Location: login-kontrol.php?error=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="tr"></html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Ali Koç Web Teknoloji proje ödevi login sayfası">
	<title>Web Teknoloji Projem</title>
	<link rel="icon" type="image/png" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login-style.css">
</head>
<body>
	<section>
		<header>
			<h1>Giriş Yap</h1>
		</header>
		<nav>
            <a href="login.php">Giriş Yap</a>
			<a href="index.html">Ana Sayfa</a>
			<a href="CV.html">CV</a>
			<a href="sehrim.html">Şehrim</a>
			<a href="kulturel-miras.html">Kültürel Miras</a>
			<a href="ilgi-alanlarim.php">İlgi Alanlarım</a>
            <a href="iletisim.html">İletişim</a>
		</nav>
		<main>
            <div class="container">
                <form class="form-inline" method="POST" action="">
                    <label for="email">Email:</label>
                    <input class="form-control mr-sm-2" type="text" id="email" name="email"><br>

                    <label for="password">Şifre:</label>
                    <input class="form-control mr-sm-2" type="password" id="password" name="password"><br>

                    <?php
                    if (isset($_GET['error']) && $_GET['error'] === '2') {
                        echo '<p style="color: red;">Email ve şifre kutularını boş bırakamazsınız</p>';
                    }
                    if (isset($_GET['error']) && $_GET['error'] === '3') {
                        echo '<p style="color: red;">Email formatı yanlış ve şifre en az 8 karakter olmalı. Lütfen tekrar deneyin</p>';
                    }
                    if (isset($_GET['error']) && $_GET['error'] === '4') {
                        echo '<p style="color: red;">Email formatı yanlış. Lütfen tekrar deneyin</p>';
                    }
                    if (isset($_GET['error']) && $_GET['error'] === '5') {
                        echo '<p style="color: red;">Şifre en az 8 karakter olmalı. Lütfen tekrar deneyin</p>';
                    }
                    ?>

                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Giriş">
                </form>
			</div>
		</main>
	</section>
</body>
</html>
