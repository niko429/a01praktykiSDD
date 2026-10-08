<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Niko">
    <title>Usuwanie instytucji</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header style="width: 400px; margin-bottom: 40px;">
        <h1>Kogo chcesz <b style="color: red;">usunąć?</b></h1>
    </header>
    <main>
         <div class="prawo_ale_klasa zwykly_border" style="margin-right: 200px">
            <h2>Edycja</h2>
            <form action="usunInstytucja.php" method="POST">
                <label for="1">Id: </label>
                <input type="number" name="id" id="1" placeholder="To pole wybiera osobę"><br>
                <input type="submit" value="Usuń" class="wycz">
            </form>
        </div>
        <?php 
            // Zmienna sql przechowuje łączenie z dazą danych MySQL. Funkcja mysqli_connect przymuje do dokładniejszego określenia z jaką dazą danych się łączymy, pierwszy parametr to nazwa hosta, drugi to nazwa użytkownika, trzeci to hasło, a czwarty to nazwa bazy danych.
            if ($sql = mysqli_connect("localhost", "root", "", "a01baza")){
                // echo "<p>Połączenie z bazą danych powiodło się</p>";
            }
            else {
                echo "<p>Nie udało się podłączyć z bazą danych</p>".mysqli_error();
            }
            // Tutaj skorzyłem z pomocy ,,gemini" aby mógł mi to poprawić ponieważ wcześniej robiłem same isset($zmienna) = htmlspecialchars($_POST["zmienna"]), oczywiście działało ale po dodaniu drugiego formulaża w HTML to zaczeło się psuć i nie wiedziałem jak to naprawić.
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $id = isset($_POST["id"]) ? htmlspecialchars($_POST["id"]) : "";
            }

            $azapytanie = "SELECT * FROM instytucja";
            $awynik = mysqli_query($sql, $azapytanie);
            
            echo "<table class='lewo_ale_klasa'";
                echo "<tr>";
                    echo "<th class='podswietlenie'>Id</th>";
                    echo "<th class='podswietlenie'>Nazwa</th>";
                    echo "<th class='podswietlenie'>Nr. Telefonu</th>";
                    echo "<th class='podswietlenie'>E-mail</th>";
                    echo "<th class='podswietlenie'>Adres</th>";
                    echo "<th class='podswietlenie'>Strona internetowa</th>";
                    echo "<th class='podswietlenie'>Uwagi</th>";
                echo "</tr>";
                while ($awynik1 = mysqli_fetch_row($awynik)) {
                    echo "<tr>";
                        echo "<td class='podswietlenie'>$awynik1[0]</td>";
                        echo "<td class='podswietlenie'>$awynik1[1]</td>";
                        echo "<td class='podswietlenie'>+48 $awynik1[2]</td>";
                        echo "<td class='podswietlenie'>$awynik1[3]</td>";
                        echo "<td class='podswietlenie'>$awynik1[4]</td>";
                        echo "<td class='podswietlenie'><a href='$awynik1[5]' target='_blank'>Strona podpięta</a></td>";
                        if ($awynik1[6] == ""){
                            echo "<td class='podswietlenie' title='Zostało to wypełnione automatycznie przez skrypt'><i>Brak uwag</i></td>";
                        } else {
                            echo "<td class='podswietlenie'>$awynik1[6]</td>";
                        }
                    echo "</tr>";
                }
            $zapytaie = "DELETE from instytucja where id='$id'";
            $wynik = mysqli_query($sql,$zapytaie);
            echo "</table>";
            mysqli_close($sql);
        ?>
    </main>
    <footer style="margin-top: 680px;">
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>
</body>
</html>