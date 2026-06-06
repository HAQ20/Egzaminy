<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><img src="pliki/baner.jpg" alt="Szkolenia"></header>
    <main>
        <section class="menu">
        <ul>
            <li><a href="index.html">Strona główna</a></li>
            <li><a href="szkolenia.php">Szkolenia</a></li>
        </ul>
        </section>
        <section class="glowny">
            <?php
                $mysqli = mysqli_connect('localhost', 'root', '', 'firma');
                $result = mysqli_query($mysqli, "SELECT szkolenia.Data, Temat FROM `szkolenia` ORDER BY szkolenia.Data ASC;");
                foreach ($result as $row){
                    echo '<p>'.$row['Data'].' '.$row['Temat'].'</p>';
                };
            ?>
        </section>
    </main>
    <footer>
        <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
        <p>Autor: HAQ</p>
    </footer>
</body>
</html>