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
                $imie = isset($_POST["imie"]) ? htmlspecialchars($_POST["imie"]) : "";
                $naz = isset($_POST["naz"]) ? htmlspecialchars($_POST["naz"]) : "";
                $tel = isset($_POST["tel"]) ? $_POST["tel"] : "";
                $mail = isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "";
                $ad = isset($_POST["ad"]) ? htmlspecialchars($_POST["ad"]) : "";
                $uwa = htmlspecialchars($_POST["uwa"]);
                
                $zapytanie = "INSERT INTO osoba (imie, nazwisko, telefon, email, adres, uwagi) VALUES ('$imie', '$naz', '$tel', '$mail', '$ad', '$uwa')";
                if ($wynik = mysqli_query($sql, $zapytanie)){
                    echo "<p>Dodano dane do bazy danych</p>";
                } else {
                    echo "<p>Nie udało się dodać danych do bazy danych</p>";
                }
            } else {
                echo "<p>Nie wysłano danych z formularza</p>";
            }

            $azapytanie = "SELECT * FROM osoba";
            $awynik = mysqli_query($sql, $azapytanie);
            
            echo "<table>";
                echo "<tr>";
                    echo "<th>Id</th>";
                    echo "<th>Imie</th>";
                    echo "<th>Nazwisko</th>";
                    echo "<th>Telefon</th>";
                    echo "<th>E-mail</th>";
                    echo "<th>Adres</th>";
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
                        echo "<td>$awynik1[5]</td>";
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