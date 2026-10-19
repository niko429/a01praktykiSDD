<?php 
    // Plik osoby.php
    class lista_osoby {

        function dane($sql){
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $imie = isset($_POST["imie"]) ? htmlspecialchars($_POST["imie"]) : "";
            $naz = isset($_POST["naz"]) ? htmlspecialchars($_POST["naz"]) : "";
            $tel = isset($_POST["tel"]) ? $_POST["tel"] : "";
            $mail = isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "";
            $ad = isset($_POST["ad"]) ? htmlspecialchars($_POST["ad"]) : "";
            $uwa = htmlspecialchars($_POST["uwa"]);
            
            $zapytanie = "INSERT INTO osoba (imie, nazwisko, telefon, email, adres, uwagi) VALUES (?,?,?,?,?,?)";
                if ($stmt = mysqli_prepare($sql, $zapytanie)){
                    mysqli_stmt_bind_param($stmt, "ssssss", $imie, $naz, $tel, $mail, $ad, $uwa);
                    if (mysqli_stmt_execute($stmt)){                    
                        echo "<p>Dodano dane do bazy danych</p>";
                    } else {
                        echo "<p>Nie udało się dodać danych do bazy danych</p>";
                    }
                } else {
                    echo "<p>Nie wysłano danych z formularza</p>";
                }
            }
        }

        function lista($sql){
            $azapytanie = "SELECT * FROM osoba";
            $awynik = mysqli_query($sql, $azapytanie);

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
        }

        function lista1($sql){
            $zapytanie1 = "SELECT osoba.id, imie, instytucja.nazwa FROM osoba INNER JOIN instytucja ON instytucja.id = osoba.id";
            $wynik1 = mysqli_query($sql, $zapytanie1);

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
        }
    }

    // Plik osoba1.php
    class lista_osoby_1 {

        function dane($sql){
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $imie = isset($_POST["imie"]) ? htmlspecialchars($_POST["imie"]) : "";
                $naz = isset($_POST["naz"]) ? htmlspecialchars($_POST["naz"]) : "";
                $tel = isset($_POST["tel"]) ? $_POST["tel"] : "";
                $mail = isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "";
                $ad = isset($_POST["ad"]) ? htmlspecialchars($_POST["ad"]) : "";
                $uwa = htmlspecialchars($_POST["uwa"]);
                
                $zapytanie = "INSERT INTO osoba (imie, nazwisko, telefon, email, adres, uwagi) VALUES (?,?,?,?,?,?)";
                if ($stmt = mysqli_prepare($sql, $zapytanie)){
                    mysqli_stmt_bind_param($stmt, "ssssss", $imie, $naz, $tel, $mail, $ad, $uwa);
                    if (mysqli_stmt_execute($stmt)){
                        echo "<p>Dodano dane do bazy danych</p>";
                    } else {
                        echo "<p>Nie udało się dodać danych do bazy danych</p>";
                    }
                }
            } else {
                echo "<p>Nie wysłano danych z formularza</p>";
            }
        }

        function lista($sql){
            $azapytanie = "SELECT * FROM osoba ORDER BY id DESC";
            $awynik = mysqli_query($sql, $azapytanie);

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
        }

        function lista1($sql){
            $zapytanie1 = "SELECT osoba.id, imie, instytucja.nazwa FROM osoba INNER JOIN instytucja ON instytucja.id = osoba.id ORDER BY osoba.id DESC";
            $wynik1 = mysqli_query($sql, $zapytanie1);

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
        }
    }

    // Plik edycjaOsoba.php
    class editOsoba{

        function lista($sql){
            $azapytanie = "SELECT * FROM osoba";
            $awynik = mysqli_query($sql, $azapytanie);
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
        }

        function edycja($sql){
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $imie = isset($_POST["imie"]) ? htmlspecialchars($_POST["imie"]) : "";
                $naz = isset($_POST["naz"]) ? htmlspecialchars($_POST["naz"]) : "";
                $tel = isset($_POST["tel"]) ? htmlspecialchars($_POST["tel"]) : "";
                $mail = isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "";
                $ad = isset($_POST["ad"]) ? htmlspecialchars($_POST["ad"]) : "";
                $uwa = isset($_POST["uwa"]) ? htmlspecialchars($_POST["uwa"]) : "";
                $id = isset($_POST["id"]) ? $_POST["id"] : "";
            }

            $zapytanie = "UPDATE osoba SET imie=?, nazwisko=?, telefon=?, email=?, adres=?, uwagi=? where id=?";
            if ($stmt = mysqli_prepare($sql,$zapytanie)){
                mysqli_stmt_bind_param($stmt, "ssssssi", $imie, $naz, $tel, $mail, $ad, $uwa, $id);
                if (mysqli_stmt_execute($stmt)){
                    // echo "<p>Udalo się zaktulizować dane</p>";
                } else {
                    echo "<p>Błąd podczas aktulizacji danyc</p>";
                }
            }
        }
    }

    // Plik usunOsoba.php
    class usunOsoba {

        function lista($sql){
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $id = isset($_POST["id"]) ? htmlspecialchars($_POST["id"]) : "";
            }

            $azapytanie = "SELECT * FROM osoba";
            $awynik = mysqli_query($sql, $azapytanie);

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
        }

    }

    // Plik wyszukiwanieOsób.php
    class wyszOsob {
        function wyszukiwanie($sql){
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $imie = isset($_POST["imie"]) ? htmlspecialchars($_POST["imie"]) : "";
                $naz = isset($_POST["naz"]) ? htmlspecialchars($_POST["naz"]) : "";
                $tel = isset($_POST["tel"]) ? htmlspecialchars($_POST["tel"]) : "";
                $mail = isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "";
                $adres = isset($_POST["ad"]) ? htmlspecialchars($_POST["ad"]) : "";
                $naz1 = isset($_POST["naz1"]) ? htmlspecialchars($_POST["naz1"]) : "";
                $rola = isset($_POST["rola"]) ? htmlspecialchars($_POST["rola"]) : "";

                $zapytanie = "SELECT osoba.id, imie, nazwisko, osoba.telefon, osoba.email, osoba.adres, instytucja.nazwa FROM osoba inner join instytucja on instytucja.id = osoba.id where imie like '$imie%' and nazwisko like '$naz%' and instytucja.nazwa like '$naz1%'";
                $wynik = mysqli_query($sql, $zapytanie);
                $wynik1 = mysqli_fetch_row($wynik);
                
                echo "<table style='margin: none auto;'>";
                    echo "<tr>";
                        echo "<th class='podswietlenie'>Id</th>";
                        echo "<th class='podswietlenie'>Imie</th>";
                        echo "<th class='podswietlenie'>Nazwisko</th>";
                        echo "<th class='podswietlenie'>Nr. Telefonu</th>";
                        echo "<th class='podswietlenie'>E-mail</th>";
                        echo "<th class='podswietlenie'>Adres</th>";
                        echo "<th class='podswietlenie'>Nazwa inst.</th>";
                        echo "<th class='podswietlenie'>Rola</th>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td class='podswietlenie'>$wynik1[0]</td>";
                        echo "<td class='podswietlenie'>$wynik1[1]</td>";
                        echo "<td class='podswietlenie'>$wynik1[2]</td>";
                        echo "<td class='podswietlenie'>$wynik1[3]</td>";
                        echo "<td class='podswietlenie'>$wynik1[4]</td>";
                        echo "<td class='podswietlenie'>$wynik1[5]</td>";
                        echo "<td class='podswietlenie'>$wynik1[6]</td>";
                        echo "<td class='podswietlenie'>Brak</td>";
                    echo "</tr>";
                echo "</table>";
            } else {
                // echo "<p>Jakimś cudem dostałeś ten komunikat.</p>";
            }
        }
    }

    // Plik instytucja.php
    class lista_inst {

        function dane($sql){
             if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $naz1 = isset($_POST["naz1"]) ? htmlspecialchars($_POST["naz1"]) : "";
                $tel1 = isset($_POST["tel1"]) ? $_POST["tel1"] : "";
                $mail1 = isset($_POST["mail1"]) ? htmlspecialchars($_POST["mail1"]) : "";
                $ad1 = isset($_POST["ad1"]) ? htmlspecialchars($_POST["ad1"]) : "";
                $str1 = isset($_POST["str"]) ? htmlspecialchars($_POST["str"]) : "";
                $uwa1 = htmlspecialchars($_POST["uwa1"]);
                
                $zapytanie = "INSERT INTO instytucja (id, nazwa, telefon, email, adres, strona_internetowa, uwagi) VALUES(NULL, ?, ?, ?, ?, ?, ?)";
                if ($stmt = mysqli_prepare($sql, $zapytanie)){
                    mysqli_stmt_bind_param($stmt, "ssssss", $naz1, $tel1, $mail1, $ad1, $str1, $uwa1);
                    if (mysqli_stmt_execute($stmt)){
                        echo "<p>Dodano dane do bazy danych</p>";
                    } else {
                        echo "<p>Nie udało się dodać danych do bazy danych</p>";
                    }
                }
            } else {
                // echo "<p>Nie wysłano danych z formularza</p>";
            }
        }

        function lista($sql){
            $azapytanie = "SELECT * FROM instytucja";
            $awynik = mysqli_query($sql, $azapytanie);

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
        }

        function lista1($sql){
            $zapytanie1 = "SELECT instytucja.id, nazwa, osoba.imie from instytucja inner join osoba on osoba.id = instytucja.id;";
            $wynik1 = mysqli_query($sql, $zapytanie1);

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
        }
    }

    // Plik instytucja1.php
    class lista_inst_1 {
        function dane($sql){
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $naz1 = isset($_POST["naz1"]) ? htmlspecialchars($_POST["naz1"]) : "";
                $tel1 = isset($_POST["tel1"]) ? $_POST["tel1"] : "";
                $mail1 = isset($_POST["mail1"]) ? htmlspecialchars($_POST["mail1"]) : "";
                $ad1 = isset($_POST["ad1"]) ? htmlspecialchars($_POST["ad1"]) : "";
                $str1 = isset($_POST["str"]) ? htmlspecialchars($_POST["str"]) : "";
                $uwa1 = htmlspecialchars($_POST["uwa1"]);
                
                $zapytanie = "INSERT INTO instytucja (id, nazwa, telefon, email, adres, strona_internetowa, uwagi) VALUES(NULL, ?, ?, ?, ?, ?, ?)";
                if ($stmt = mysqli_prepare($sql, $zapytanie)){
                    mysqli_stmt_bind_param($stmt, "ssssss", $naz1, $tel1, $mail1, $ad1, $str1, $uwa1);
                        if (mysqli_stmt_execute($stmt)){
                            echo "<p>Dodano dane do bazy danych</p>";
                        } else {
                            echo "<p>Nie udało się dodać danych do bazy danych</p>";
                        }
                    }
            } else {
                // echo "<p>Nie wysłano danych z formularza</p>";
            }
        }

        function lista($sql){
            $azapytanie = "SELECT * FROM instytucja ORDER BY id DESC";
            $awynik = mysqli_query($sql, $azapytanie);
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
        }

        function lista1($sql){
            $zapytanie1 = "SELECT instytucja.id, nazwa, osoba.imie from instytucja inner join osoba on osoba.id = instytucja.id ORDER BY instytucja.id DESC";
            $wynik1 = mysqli_query($sql, $zapytanie1);

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
        }
    }

    // Plik eydcjaInstytucji.php
    class editInst {

        function lista($sql){
            $azapytanie = "SELECT * FROM instytucja";
            $awynik = mysqli_query($sql, $azapytanie);

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
        }

        function edycja($sql){
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $naz = isset($_POST["naz"]) ? htmlspecialchars($_POST["naz"]) : "";
                $tel = isset($_POST["tel"]) ? htmlspecialchars($_POST["tel"]) : "";
                $mail = isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "";
                $ad = isset($_POST["ad"]) ? htmlspecialchars($_POST["ad"]) : "";
                $str = isset($_POST["str"]) ? htmlspecialchars($_POST["str"]) : "";
                $uwa = isset($_POST["uwa"]) ? htmlspecialchars($_POST["uwa"]) : "";
                $id = isset($_POST["id"]) ? $_POST["id"] : "";
            }

            $zapytanie = "UPDATE instytucja set nazwa=?, telefon=?, email=?, adres=?, strona_internetowa=?, uwagi=? where id='$id'";
            if ($stmt = mysqli_prepare($sql,$zapytanie)){
                mysqli_stmt_bind_param($stmt, "ssssss", $naz, $tel, $mail, $ad, $str, $uwa);
                if (mysqli_stmt_execute($stmt)){
                    // echo "<p>Udało się zaktulizować dane!</p>";
                } else {
                    echo "<p>Nie udało się zaktulizować danych</p>";
                }
            } else {
                // echo "<p>Coś po stronie serwera nie poszło poprawnie, proszę spróbować ponownie</p>";
            }
        }
    }

    // Plik usunInstytucja.php
    class usunInst {

        function lista($sql){
              if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $id = isset($_POST["id"]) ? htmlspecialchars($_POST["id"]) : "";
            }

            $azapytanie = "SELECT * FROM instytucja";
            $awynik = mysqli_query($sql, $azapytanie);

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
        }
    }

    // Plik wyszukiwanieInstytucji.php
    class wyszInst {

        function wyszukiwanie($sql){
                            
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $nazinst = isset($_POST["nazinst"]) ? htmlspecialchars($_POST["nazinst"]) : "";
                $tel = isset($_POST["tel"]) ? htmlspecialchars($_POST["tel"]) : "";
                $mail = isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "";
                $adres = isset($_POST["ad"]) ? htmlspecialchars($_POST["ad"]) : "";
                $stro = isset($_POST["str"]) ? htmlspecialchars($_POST["str"]) : "";
                $naz = isset($_POST["naz"]) ? htmlspecialchars($_POST["naz"]) : "";

                $zapytanie = "SELECT instytucja.id, instytucja.nazwa, instytucja.telefon, instytucja.email, instytucja.adres, instytucja.strona_internetowa, osoba.nazwisko from instytucja inner join osoba on osoba.id = instytucja.id where osoba.nazwisko like '$naz%'";
                $wynik = mysqli_query($sql, $zapytanie);
                $wynik1 = mysqli_fetch_row($wynik);

                echo "<table style='margin: none auto;'>";
                    echo "<tr>";
                        echo "<th class='podswietlenie'>Id</th>";
                        echo "<th class='podswietlenie'>Nazwa inst.</th>";
                        echo "<th class='podswietlenie'>Nr. Telefonu</th>";
                        echo "<th class='podswietlenie'>E-mail</th>";
                        echo "<th class='podswietlenie'>Adres</th>";
                        echo "<th class='podswietlenie'>Str. internetowa</th>";
                        echo "<th class='podswietlenie'>Nazwisko</th>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td class='podswietlenie'>$wynik1[0]</td>";
                        echo "<td class='podswietlenie'>$wynik1[1]</td>";
                        echo "<td class='podswietlenie'>$wynik1[2]</td>";
                        echo "<td class='podswietlenie'>$wynik1[3]</td>";
                        echo "<td class='podswietlenie'>$wynik1[4]</td>";
                        echo "<td class='podswietlenie'><a href='$wynik1[5]' target='_blank'>Strona</a></td>";
                        echo "<td class='podswietlenie'>$wynik1[6]</td>";
                    echo "</tr>";
                echo "</table>";
            } else {
                // echo "<p>Jakimś cudem dostałeś ten komunikat.</p>";
            }
        }
    }
?>