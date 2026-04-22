<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zdrowy bazarek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "bazar");
    ?>
    <nav>
        <h1>Zdrowy bazarek</h1>
        <?php
        $result = $mysqli->query("SELECT plik, rodzaj FROM towar");
        while($row = $result->fetch_assoc()){
            echo "<img src='pliki3-1/".$row['plik']."' alt='".$row['rodzaj']."'>";
        }
        ?>    
        </nav>
    <div class="boczny">
        <img src="pliki3-1/market.png" alt="bazarek">
    </div>
    <section>
        <p>Wybierz owoc lub warzywo i podaj wagę</p>
        <form action="skrypt.php" method="post">
            <select name="produkt" id="produkt"></select>
            <input type="number" name="waga" id="waga" step="0.01" required>
            <input type="submit" value="Zamów">
        </form>
        <?php
            $mysqli = new mysqli("localhost", "root", "", "bazar");
            if ($_POST['produkt'] && $_POST['waga']){
                $produkt = $_POST['produkt'];
                $waga = $_POST['waga'];

            }
        ?>
    </section>
    <footer>Stronę opracował: 00000000</footer>
</body>
</html>