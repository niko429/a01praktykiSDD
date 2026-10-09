<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Niko">
    <title>Usuwanie osoby</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header style="width: 400px; margin-bottom: 40px;">
        <h1>Kogo chcesz <b style="color: red;">usunąć?</b></h1>
    </header>
    <main>
         <div class="prawo_ale_klasa zwykly_border" style="margin-right: 200px">
            <h2>Edycja</h2>
            <form action="usunOsoba.php" method="POST">
                <label for="1">Id: </label>
                <input type="number" name="id" id="1" placeholder="To pole wybiera osobę"><br>
                <input type="submit" value="Usuń" class="wycz">
            </form>
        </div>
        <?php 
            require_once './config.php';
            
            // Tutaj skorzyłem z pomocy ,,gemini" aby mógł mi to poprawić ponieważ wcześniej robiłem same isset($zmienna) = htmlspecialchars($_POST["zmienna"]), oczywiście działało ale po dodaniu drugiego formulaża w HTML to zaczeło się psuć i nie wiedziałem jak to naprawić.
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $id = isset($_POST["id"]) ? htmlspecialchars($_POST["id"]) : "";
            }

            $azapytanie = "SELECT * FROM osoba";
            $awynik = mysqli_query($sql, $azapytanie);
            
            echo "<table class='lewo_ale_klasa'>";
                echo "<tr>";
                    echo "<th class='podswietlenie'>Id</th>";
                    echo "<th class='podswietlenie'>Imie</th>";
                    echo "<th class='podswietlenie'>Nazwisko</th>";
                    echo "<th class='podswietlenie'>Nr. Telefonu</th>";
                    echo "<th class='podswietlenie'>E-mail</th>";
                    echo "<th class='podswietlenie'>Adres</th>";
                    echo "<th class='podswietlenie'>Uwagi</th>";
                echo "</tr>";
                while ($awynik1 = mysqli_fetch_row($awynik)) {
                    echo "<tr>";
                        echo "<td class='podswietlenie'>$awynik1[0]</td>";
                        echo "<td class='podswietlenie'>$awynik1[1]</td>";
                        echo "<td class='podswietlenie'>$awynik1[2]</td>";
                        echo "<td class='podswietlenie'>+48 $awynik1[3]</td>";
                        echo "<td class='podswietlenie'>$awynik1[4]</td>";
                        echo "<td class='podswietlenie'>$awynik1[5]</td>";
                        if ($awynik1[6] == ""){
                            echo "<td class='podswietlenie' title='Zostało to wypełnione automatycznie przez skrypt'><i>Brak uwag</i></td>";
                        } else {
                            echo "<td class='podswietlenie'>$awynik1[6]</td>";
                        }
                    echo "</tr>";
                }

            $zapytaie = "DELETE from osoba where id='$id'";
            $wynik = mysqli_query($sql,$zapytaie);
            echo "</table>";
            mysqli_close($sql);
        ?>
    </main>
    <footer style="margin-top: 735px;">
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>
</body>
</html>