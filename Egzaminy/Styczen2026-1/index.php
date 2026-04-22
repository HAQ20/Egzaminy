<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Konfigurator samochodów</title>
	<link rel="stylesheet" href="styl.css">
</head>
<body>
	<header>
		<h1>Serwis konfiguracji samochodów</h1>
	</header>

	<nav>
		<h2>Samochody</h2>
		<h2>Konfigurator</h2>
		<h2>Kontakt</h2>
	</nav>

	<?php
	$polaczenie = mysqli_connect('localhost', 'root', '', 'samochody');
	?>

	<main>
		<section class="lewa">
			<table>
				<?php
				if ($polaczenie) {
					$zapytanie3 = "SELECT p.marka, p.model, k.nazwa, (p.cena + IFNULL(k.doplata, 0)) AS cena_calkowita
								  FROM pojazdy p
								  JOIN kolory k ON p.kolor = k.id
								  WHERE p.model = 'alfa'
								  ORDER BY p.kolor, p.id";

					$wynik3 = mysqli_query($polaczenie, $zapytanie3);

					if ($wynik3) {
						while ($wiersz = mysqli_fetch_assoc($wynik3)) { 
							echo '<tr>';
							echo '<td>' . $wiersz['marka'] . '</td>';
							echo '<td>' . $wiersz['model'] . '</td>';
							echo '<td>' . $wiersz['nazwa'] . '</td>';
							echo '<td>' . (int)$wiersz['cena_calkowita'] . '</td>';
							echo '</tr>';
						}
						mysqli_free_result($wynik3);
					}
				}
				?>
			</table>
		</section>

		<section class="srodek">
			<table>
				<tr>
					<th colspan="2">Konfiguracja</th>
					<th>Cena</th>
				</tr>
				<?php
				$rekordyKonfiguracji = [];

				if ($polaczenie) {
					$zapytanie4 = "SELECT marka, model, cena
								  FROM pojazdy
								  WHERE marka = 'BM' AND model = 'beta' AND cena IN (94000, 77000)
								  ORDER BY cena DESC
								  LIMIT 2";

					$wynik4 = mysqli_query($polaczenie, $zapytanie4);

					if ($wynik4) {
						while ($wiersz = mysqli_fetch_assoc($wynik4)) {
							$rekordyKonfiguracji[] = $wiersz;
						}
						mysqli_free_result($wynik4);
					}
				}

				$rekord1 = $rekordyKonfiguracji[0] ?? ['marka' => '-', 'model' => '-', 'cena' => '-'];
				$rekord2 = $rekordyKonfiguracji[1] ?? ['marka' => '-', 'model' => '-', 'cena' => '-'];
				?>
				<tr>
					<td colspan="2"><img src="Styczen2026/pliki1/a1.jpg" alt="Konfiguracja 1"></td>
				</tr>
				<tr>
					<td>Marka</td>
					<td><?php echo $rekord1['marka']; ?></td>
					<td rowspan="2"><?php echo $rekord1['cena']; ?></td>
				</tr>
				<tr>
					<td>Model</td>
					<td><?php echo $rekord1['model']; ?></td>
				</tr>
				<tr>
					<td colspan="2"><img src="Styczen2026/pliki1/a2.jpg" alt="Konfiguracja 2"></td>
					<td></td>
				</tr>
				<tr>
					<td>Marka</td>
					<td><?php echo $rekord2['marka']; ?></td>
					<td rowspan="2"><?php echo $rekord2['cena']; ?></td>
				</tr>
				<tr>
					<td>Model</td>
					<td><?php echo $rekord2['model']; ?></td>
				</tr>
			</table>
		</section>

		<section class="prawa">
			<h3>111 222 444</h3>
			<img src="Styczen2026/pliki1/a3.png" alt="Samochód">
		</section>
	</main>

	<?php
	if ($polaczenie) {
		mysqli_close($polaczenie);
	}
	?>

	<footer>
		<p>Stronę wykonał: 000000000</p>
	</footer>
</body>
</html>
