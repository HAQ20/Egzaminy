<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="icon" type="image/icon-x" href="pliki/fav.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><img src="pliki/baner.png" alt="Mieszalnia farb"></header>
    <form method="POST">
        <label for="od">Data odbioru od: </label>
        <input type="date" name="od">
        <label for="do">do: </label>
        <input type="date" name="do">
        <input type="submit" value="Wyszukaj" name="submit">
    </form>
    <main>
        <table>
            <tr>
                <td>Nr zamówienia</td>
                <td>Nazwisko</td>
                <td>Imię</td>
                <td>Kolor</td>
                <td>Pojemność [ml]</td>
                <td>Data odbioru</td>
            </tr>
            <!-- skrypt 1 -->
             <?php
                $mysqli = mysqli_connect("localhost", "root", "", "mieszalnia");
                
                if(isset($_POST['submit'])){
                    $od = $_POST['od'];
                    $do = $_POST['do'];
                    $stmt = mysqli_prepare($mysqli, "SELECT Nazwisko, Imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM `klienci` JOIN zamowienia z ON z.id_klienta = klienci.Id WHERE z.data_odbioru BETWEEN ? AND ?");
                    mysqli_stmt_bind_param($stmt, "ss", $od, $do);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                } else {
                     $result = mysqli_query($mysqli, "SELECT Nazwisko, Imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM `klienci` JOIN zamowienia z ON z.id_klienta = klienci.Id ORDER BY z.data_odbioru ASC");

                }
                foreach($result as $row){
                        echo 
                        '
                        <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['Nazwisko'].'</td>
                        <td>'.$row['Imie'].'</td>
                        <td style="background-color: #'.$row['kod_koloru'].'">'.$row['kod_koloru'].'</td>
                        <td>'.$row['pojemnosc'].'</td>
                        <td>'.$row['data_odbioru'].'</td>
                        </tr>
                        ';
                    }
                mysqli_close($mysqli);
             ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: HAQ</p>
    </footer>
</body>
</html>