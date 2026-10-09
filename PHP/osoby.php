<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nikodem">
    <title>Lista osób</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Lista osób</h1>
    </header>
    <main>
        <?php 
            require_once './config.php';
                // if ($sql = mysqli_connect('localhost','root','','a01baza')){
                //     // echo "<p>Udało się podłączyć z bazą danych</p>";
                // } else {
                //     echo "<p>Nie udało się podłączyć z bazą danych</p>";
                // }
            
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
            
            // Chce zroibć tak że te ,,azapytanie" i ten wynik będzie w tym pliku oraz ta tabela, choć nie wiem jak to dalej z
            require_once './db.php';

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
                echo "<tr>";
                    echo "<td colspan='7'><a href='./osoba1.php'>Filtrowanie od największej względem ID</a></td>";
                echo "</tr>";
            echo "</table>";

            $zapytanie1 = "SELECT osoba.id, imie, instytucja.nazwa FROM osoba INNER JOIN instytucja ON instytucja.id = osoba.id";
            $wynik1 = mysqli_query($sql, $zapytanie1);
            echo "<table class='prawo_ale_klasa''>";
                echo "<tr>";
                    echo "<th class='podswietlenie'>Id</th>";
                    echo "<th class='podswietlenie'>Imię</th>";
                    echo "<th class='podswietlenie'>Nazwa instytucji</th>";
                echo "</tr>";
                    // Próba 3
                        // while ($wynik2 = mysqli_fetch_row($wynik1)){
                        //     echo "<tr>";
                        //     if ($wynik2[0] == "" and $wynik2[1] == ""){
                        //         echo "<td class='podswietlenie'><i title='To zostało automatycznie dodane po przez skrypt oznaczający że jakimś cudem tutaj nie ma danych'>Brak danych</i></td>";
                        //         echo "<td class='podswietlenie'><i title='To zostało automatycznie dodane po przez skrypt oznaczający że jakimś cudem tutaj nie ma danych'>Brak danych</i></td>";
                        //     } else {
                        //         echo "<td class='podswietlenie'>$wynik2[0]</td>";
                        //         echo "<td class='podswietlenie'>$wynik2[1]</td>";
                        //     }
                        //     echo "</tr>";

                    // Próba 2
                        while ($wynik2 = mysqli_fetch_row($wynik1)){
                            echo "<tr>";
                                echo "<td class='podswietlenie'>$wynik2[0]</td>";
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
                    // Próba 1
                        // echo "<td class='podswietlenie'>";
                        //     if ($wynik2[0] == ""){
                        //         echo "<i title='To zostało automatycznie dodane po przez skrypt oznaczający że jakimś cudem tutaj nie ma danych'>Brak imiona</i>";
                        //     } else {
                        //         echo $wynik2[0];
                        //     }
                        // echo "</td>";
                        // echo "<td class='podswietlenie'>";
                        // if ($wynik2[1] == "") {
                        //     echo "<i title='To zostało automatycznie dodane po przez skrypt oznaczający że jakimś cudem tutaj nie ma danych'>Brak nazwy</i>";
                        // } else {
                        //     echo $wynik2[1];
                        // }
                        // echo "</td>";
            echo "</table>";    
            mysqli_close($sql);
        ?>
        <div style="display: flex;">
            <h2 style="width: 100px;"><a href="./edycjaOsoba.php" style="text-decoration: none;">Edycja?</a></h2>
            <h2 style="width: 100px;"><a href="./usunOsoba.php" style="text-decoration: none;">Usunąć?</a></h2>
        </div>
    </main>
    <footer>
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>
</body>
</html>