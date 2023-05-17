<!DOCTYPE html>
<html lang="tr"></html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
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
                <?php
                if (isset($_GET['error']) && $_GET['error'] === '0') {
                    header("Refresh: 5; URL='index.html'");
                    echo '<h2 style="color: blue;">Giriş işlemi başarılı</h2>';
                    echo '<h2>Hoşgeldin g221210059</h2>';
                    echo '<h2>5 saniye içerisinde ana sayfaya yönlendirileceksiniz</h2>';
                    echo '<p>Eğer otomatik olarak geri yönlendirilmezseniz <a href="index.html">buraya tıklayın</a></p>';
                }
                elseif (isset($_GET['error']) && $_GET['error'] === '1') {
                    header("Refresh: 5; URL='login.php'");
                    echo '<h2 style="color: red;">Email veya şifre yanlış</h2>';
                    echo '<h2>5 saniye içerisinde geri yönlendirileceksiniz</h2>';
                    echo '<p>Eğer otomatik olarak geri yönlendirilmezseniz <a href="login.php">buraya tıklayın</a></p>';
                }
                else {
                    header("Refresh: 5; URL='login.php'");
                    echo '<h2 style="color: red;">Hata, bu sayfada bulunmamanız gerekiyor</h2>';
                    echo '<h2>5 saniye içerisinde giriş sayfasına yönlendirileceksiniz</h2>';
                    echo '<p>Eğer otomatik olarak geri yönlendirilmezseniz <a href="login.php">buraya tıklayın</a></p>';
                }
                ?>
			</div>
		</main>
	</section>
</body>
</html>
