<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zdrowy bazarek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zdrowy bazarek</h1>
    </header>
    <nav>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "bazar");
        $result = $mysqli->query("SELECT plik, rodzaj, nazwa FROM towar WHERE rodzaj='owoc'");
        while($row = $result->fetch_assoc()){
            echo "<img src='pliki3-1/".$row['plik']."' alt='".$row['nazwa']."'>";
        }
        ?>    
        </nav>
    <main class="content">
        <div class="boczny">
            <img src="pliki3-1/market.png" alt="bazarek">
        </div>
        <section>

            <p>Wybierz owoc lub warzywo i podaj wagę</p>
            <form method="post">
                <select name="produkt" id="produkt">
                <?php
                $result = $mysqli->query("SELECT nazwa, id FROM towar");
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row['id']."'>".$row['nazwa']."</option>";
                }    
                ?>
                </select>
                <input type="number" name="waga" id="waga" step="0.01" required>
                <input type="submit" value="Zamów" name='zamow'>
            </form>
            <?php
            if(isset($_POST['zamow'])){
                $produkt = $_POST['produkt'];
                $waga = $_POST['waga'];
                $result = $mysqli->query("SELECT rodzaj, nazwa, cena FROM towar WHERE id=".$produkt);
                $row = $result->fetch_assoc();
                $rodzaj = $row['rodzaj'];
                $nazwa = $row['nazwa'];
                $cena_za_kg = $row['cena'];
                $cena = $cena_za_kg * $waga;
                echo "<p>".$rodzaj." ".$nazwa." wartość: ".number_format($cena, 2)." zł</p>";
                $mysqli->query("INSERT INTO zamowienia (id_towaru, waga) VALUES (".$produkt.", ".$waga.")");
                $mysqli->close();
            }
            ?>
        </section>
    </main>
    <footer>Stronę opracował: 00000000</footer>
</body>
</html>