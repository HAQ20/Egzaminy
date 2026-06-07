<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2><em>Koło szachowe gambit piona</em></h2>
    </header>
    <main>
        <section class="lewy">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1.jpg">Kwerenda1</a></li>
                <li><a href="kw2.jpg">Kwerenda2</a></li>
                <li><a href="kw3.jpg">Kwerenda3</a></li>
                <li><a href="kw4.jpg">Kwerenda4</a></li>
            </ul>
            <img src="pliki/logo.png" alt="">
        </section>
        <section class="prawy">
            <h3>Najlepsi gracze naszego koła</h3>
            <table>
                <tr>
                    <td>Pozycja</td>
                    <td>Pseudonim</td>
                    <td>Tytuł</td>
                    <td>Ranking</td>
                    <td>Klasa</td>
                </tr>
                <!-- skrypt 1 -->
                 <?php
                 $mysqli = mysqli_connect("localhost", "root", "", "szachy");
                 $result = mysqli_query($mysqli, "SELECT pseudonim, tytul, ranking, klasa FROM `zawodnicy` WHERE ranking > 2787 ORDER BY ranking DESC;");
                 $poz = 0;
                 foreach($result as $row){
                    $poz++;
                    echo 
                    '
                    <tr>
                        <td>'.$poz.'</td>
                        <td>'.$row['pseudonim'].'</td>
                        <td>'.$row['tytul'].'</td>
                        <td>'.$row['ranking'].'</td>
                        <td>'.$row['klasa'].'</td>
                    </tr>
                    ';
                 }
                 ?>
            </table>
            <form method="POST">
                <input type="submit" value="Losuj nową parę graczy" name="losuj">
            </form>
            <br>
            <!-- skrypt 2 -->
            <?php
            $submit = $_POST['losuj'];
            if(isset($submit)){
                $result = mysqli_query($mysqli, "SELECT pseudonim, klasa FROM `zawodnicy` ORDER BY rand() LIMIT 2;");
                foreach($result as $row){
                    echo '<h4>'.$row["pseudonim"].' '.$row["klasa"].' </h4>';
                }
                mysqli_close($mysqli);
            }
            ?>
             <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
        </section>
    </main>
    <footer>Stronę wykonał: HAQ</footer>
</body>
</html>