<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Ali Koç Web Teknoloji proje ödevi login sayfası">
	<title>Web Teknoloji Projem</title>
	<link rel="icon" type="image/png" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="iletisim-style.css">
</head>
<body>
	<section>
		<header>
			<h1>İletişim</h1>
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
				<div class="col-lg-12">
					<table class="table table-striped">
						<tr>
							<td >Kullanıcı adı:</td>
							<td ><?php echo $_POST["kullaniciAdi"]?></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td ><?php echo $_POST["eposta"]?></td>
							</tr>
						<tr>
							<td>Şifre:</td>
							<td ><?php echo $_POST["sifre"]?></td>
						</tr>
						<tr>
							<td>Yaşadığınız Şehir:</td>
							<td ><?php echo $_POST["secilenSehir"]?></td>
						</tr>
						<tr>
							<td>Adres</td>
							<td ><?php echo $_POST["secilenAdres"]?></td>
						</tr>
						<tr>
							<td>Bildiğiniz programlama dilleri:</td>
							<td>
								<?php
									if (isset($_POST['diller']) && is_array($_POST['diller'])) {
									$check = implode(", ", $_POST['diller']);
									echo $check;
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Kaç yıllık tecrübe sahibisiniz:</td>
							<td ><?php echo $_POST["inlineRadioOptions"]?></td>
						</tr>
					</table>
				</div>
			</div>
		</main>
	</section>
</body>
</html>
