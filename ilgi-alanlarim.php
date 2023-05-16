<!DOCTYPE html>
<html lang="tr"></html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Ali Koç Web Teknoloji proje ödevi API içeren ilgi alanlarım sayfası">
	<title>Web Teknoloji Projem</title>
	<link rel="icon" type="image/png" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="ilgi-alanlarim-style.css">
</head>
<body>
	<section>
		<header>
			<h1>İlgi Alanlarım</h1>
		</header>
		<nav>
			<a href="login.php">Giriş Yap</a>
			<a href="index.html">Ana Sayfa</a>
			<a href="CV.html">CV</a>
			<a href="sehrim.html">Şehrim</a>
			<a href="kulturel-miras.html">Kültürel Miras</a>
			<a href="ilgi-alanlarim.php">İlgi Alanlarım</a>
		</nav>
		<main>
		<div class="container">
    		<h2>Steam Arama Motoru</h2>
				<form class="form-inline" method="GET">
					<input class="form-control mr-sm-2" type="search" name="search" placeholder="Oyun adı gir..." aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ara</button>
				</form>
				
				<?php
				include 'config.php';

				if (isset($_GET['search']) && !(empty($_GET['search']))) {
					$searchText = urlencode($_GET['search']);
					$url = "https://steam2.p.rapidapi.com/search/{$searchText}/page/1";

					$curl = curl_init();

					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // SUNUCUYA GEÇERKEN BUNU SİLMEYİ BIRAKMAYI UNUTMA

					curl_setopt_array($curl, [
						CURLOPT_URL => $url,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 30,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "GET",
						CURLOPT_HTTPHEADER => [
							"X-RapidAPI-Host: steam2.p.rapidapi.com",
							"X-RapidAPI-Key: $RAPID_API"
						],
					]);

					$response = curl_exec($curl);
					$err = curl_error($curl);

					curl_close($curl);

					$results = json_decode($response, true);

					if ($err) {
						echo "cURL Error #:" . $err;
					} else {
						if (empty($results)) {
							echo '<div class="game-info">';
							echo "<strong>Sonuç bulunamadı</strong>";
							echo "</div>";
						} else {
							foreach ($results as $result) {
								if (isset($result['reviewSummary'])) {
									$string = $result['reviewSummary'];
									$parca = explode("<br>", $string);
								}
								else {
									$parca[0] = "Unavailable";
									$parca[1] = "";
								}

								echo '<div class="game-info">';
									echo '<img src="' . $result['imgUrl'] . '" alt="Game Image">';
									echo '<div class="details">';
										echo "<h2>" . $result['title'] . "</h2>";
										echo "<p><strong>Release Date:</strong> " . $result['released'] . " </p>";
										echo "<p><strong>Review Summary:</strong> " . $parca[0] . " </p>";
										echo "<p> " . $parca[1] . "</p>";
										echo '<p><a href="' . $result['url'] . '" target="_blank">View on Steam</a></p>';
									echo "</div>";
								echo "</div>";
							}
						}
					}
				}
				?>
			</div>
		</main>
	</section>
</body>
</html>
