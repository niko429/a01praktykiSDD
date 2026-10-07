<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nikodem">
    <title>Projekt SDD</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Projekt SDD</h1>
    </header>
    <main>
        <?php 
            // Zmienna sql przechowuje łączenie z dazą danych MySQL. Funkcja mysqli_connect przymuje do dokładniejszego określenia z jaką dazą danych się łączymy, pierwszy parametr to nazwa hosta, drugi to nazwa użytkownika, trzeci to hasło, a czwarty to nazwa bazy danych.
            if ($sql = mysqli_connect("localhost", "root", "", "a01baza")){
                // echo "<p>Połączenie z bazą danych powiodło się</p>";
            }
            else {
                echo "<p>Nie udało się podłączyć z bazą danych</p>";
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

            $azapytanie = "SELECT * FROM instytucja";
            $awynik = mysqli_query($sql, $azapytanie);
            
            echo "<table>";
                echo "<tr>";
                    echo "<th>Id</th>";
                    echo "<th>Nazwa</th>";
                    echo "<th>Telefon</th>";
                    echo "<th>E-mail</th>";
                    echo "<th>Adres</th>";
                    echo "<th>Strona internetowa</th>";
                    echo "<th>Uwagi</th>";
                    echo "<th>Edycja?</th>";
                echo "</tr>";
                while ($awynik1 = mysqli_fetch_row($awynik)) {
                    echo "<tr>";
                        echo "<td>$awynik1[0]</td>";
                        echo "<td>$awynik1[1]</td>";
                        echo "<td>$awynik1[2]</td>";
                        echo "<td>$awynik1[3]</td>";
                        echo "<td>$awynik1[4]</td>";
                        echo "<td><a href='$awynik1[5]' target='_blank'>Strona podpięta</a></td>";
                        echo "<td>$awynik1[6]</td>";
                        echo '<td><input type="submit" value="Tak" name="wyslij" class="wycz_plus"></td>';
                    echo "</tr>";
                }
            mysqli_close($sql);
        ?>
    </main>
    <footer>
        <p>Autor: Nikodem Naperty. <a href="start.html">Powrót?</a></p>
    </footer>
</body>
</html>