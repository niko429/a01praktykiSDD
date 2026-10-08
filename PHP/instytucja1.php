<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nikodem">
    <title>Lista instytucji</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Lista inst.</h1>
    </header>
    <main>
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
                $naz1 = isset($_POST["naz1"]) ? htmlspecialchars($_POST["naz1"]) : "";
                $tel1 = isset($_POST["tel1"]) ? $_POST["tel1"] : "";
                $mail1 = isset($_POST["mail1"]) ? htmlspecialchars($_POST["mail1"]) : "";
                $ad1 = isset($_POST["ad1"]) ? htmlspecialchars($_POST["ad1"]) : "";
                $str1 = isset($_POST["str"]) ? htmlspecialchars($_POST["str"]) : "";
                $uwa1 = htmlspecialchars($_POST["uwa1"]);
                
                $zapytanie = "INSERT INTO instytucja (id, nazwa, telefon, email, adres, strona_internetowa, uwagi) VALUES(NULL,'$naz1', '$tel1', '$mail1', '$ad1', '$str1', '$uwa1')";
                if ($wynik = mysqli_query($sql, $zapytanie)){
                    echo "<p>Dodano dane do bazy danych</p>";
                } else {
                    echo "<p>Nie udało się dodać danych do bazy danych</p>";
                }
            } else {
                echo "<p>Nie wysłano danych z formularza</p>";
            }

            $azapytanie = "SELECT * FROM instytucja ORDER BY id DESC";
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
                echo "<tr>";
                    echo "<td colspan='7'><a href='./instytucja.php'>Filtrowanie od najmniejszej względem ID</a></td>";
                echo "</tr>";
            echo "</table>";

            $zapytanie1 = "SELECT instytucja.id, nazwa, osoba.imie from instytucja inner join osoba on osoba.id = instytucja.id ORDER BY instytucja.id DESC";
            $wynik1 = mysqli_query($sql, $zapytanie1);
            echo "<table class='prawo_ale_klasa''>";
                echo "<tr>";
                    echo "<th class='podswietlenie'>Id</th>";
                    echo "<th class='podswietlenie'>Nazwa instytucji</th>";
                    echo "<th class='podswietlenie'>Imię</th>";
                echo "</tr>";
                    while ($wynik2 = mysqli_fetch_row($wynik1)){
                        echo "<tr>";
                            echo "<td class='podswietlenie'>$wynik2[0]";
                            if ($wynik2[1] == ""){
                                echo "<td class='podswietlenie'><i title='To zostało automatycznie dodane po przez skrypt oznaczający że jakimś cudem tutaj nie ma danych'>Brak imiona</i></td>";
                            } else {
                                echo "<td class='podswietlenie'>$wynik2[1]</td>";
                            }
                            if ($wynik2[2] == ""){
                                echo "<td class='podswietlenie'><i title='To zostało automatycznie dodane po przez skrypt oznaczający że jakimś cudem tutaj nie ma danych'>Brak nazwy</i></td>";
                            } else {
                                echo "<td class='podswietlenie'>$wynik2[2]</td>";
                            }
                        echo "</tr>";
                    }
            echo "</table>";    
            mysqli_close($sql);
        ?>
        <div style="display: flex;">
            <h2 style="width: 100px;"><a href="./edycjaInstytucji.php" style="text-decoration: none;">Edycja?</a></h2>
            <h2 style="width: 100px;"><a href="./usunInstytucja.php" style="text-decoration: none;">Usunąć?</a></h2>
        </div>
        
    </main>
    <footer>
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>
</body>
</html>