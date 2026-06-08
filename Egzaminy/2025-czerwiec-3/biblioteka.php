<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTEKA SZKOLNA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>STRONA BIBLIOTEKI SZKOLNEJ WIEDZAMIN</h2>
    </header>
    <section class="top">
        <h3>Nasze dzisiejsze propozycje:</h3>
        <table>
            <tr>
                <td>Autor</td>
                <td>Tytuł</td>
                <td>Katalog</td>
            </tr>
            <!-- Script 1 -->
             <?php
             $mysqli = mysqli_connect("localhost", "root", "", "biblioteka");
             $result = mysqli_query($mysqli, "SELECT autor, kod, tytul FROM `ksiazki` ORDER BY rand() LIMIT 5;");
             foreach($result as $row){
                echo 
                '
                <tr>
                    <td>'.$row['autor'].'</td>
                    <td>'.$row['tytul'].'</td>
                    <td>'.$row['kod'].'</td>
                </tr>
                ';
             }
             mysqli_close($mysqli);
             ?>
        </table>
    </section>
    <main>
        <article><img src="pliki/ksiazka1.jpg" alt="okładka książki"><p>Według r�nych poda� najpaskudniejsza ropucha nosi w g�owie pi�kny, cenny klejnot.</p></article>
        <article><img src="pliki/ksiazka2.jpg" alt="okładka książki"><p>Panna Stefcia i Maryla nie s� to zbyt grzeczne damy, nawet nie s�uchaj� mamy...</p></article>
        <article><img src="pliki/ksiazka3.jpg" alt="okładka książki"><p>Ratuj mnie, przyjacielu, w ostatniej potrzebie: Kocham pi�kn� Iren�. Rodzice i ona...</p></article>
    </main>
    <footer>
        Stronę wykonał: HAQ
    </footer>
</body>
</html>