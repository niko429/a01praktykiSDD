<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Niko">
    <title>Edycja instytucji</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header style="width: 444px; margin-bottom: 40px;">
        <h1>Kogo chcesz zedytować?</h1>
    </header>
    <main>
        <div class="prawo_ale_klasa zwykly_border" style="margin-right: 200px">
            <h2>Edycja</h2>
            <form action="edycjaInstytucji.php" method="POST">
                <label for="1">Id: </label>
                <input type="number" name="id" id="1" placeholder="To pole wybiera inst."><br> 
                <label for="2">Nazwa: </label>
                <input type="text" name="naz" id="2"><br>
                <label for="3">Nr. Telefonu: </label>
                <input type="text" name="tel" id="3" placeholder="000-000-000"><br>
                <label for="4">E-mail: </label>
                <input type="text" name="mail" id="4"><br>
                <label for="5">Adres: </label>
                <input type="text" name="ad" id="5"><br>
                <label for="6">Str. Inertnetowa: </label>
                <input type="text" name="str" id="6" placeholder="www.example.com"><br>
                <label for="7">Uwagi: </label>
                <input type="text" name="uwa" id="7"><br>
                <input type="submit" value="Zmień" class="dod">
                <input type="reset" value="Usuń" class="wycz">
            </form>
        </div>
        <?php
            if ($sql = mysqli_connect("localhost", "root", "", "a01baza")){
                // echo "<p>Połączenie z bazą danych powiodło się</p>";
            }
            else {
                echo "<p>Nie udało się podłączyć z bazą danych</p>".mysqli_error();
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
            echo "</table>";

            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $naz = isset($_POST["naz"]) ? htmlspecialchars($_POST["naz"]) : "";
                $tel = isset($_POST["tel"]) ? htmlspecialchars($_POST["tel"]) : "";
                $mail = isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "";
                $ad = isset($_POST["ad"]) ? htmlspecialchars($_POST["ad"]) : "";
                $str = isset($_POST["str"]) ? htmlspecialchars($_POST["str"]) : "";
                $uwa = isset($_POST["uwa"]) ? htmlspecialchars($_POST["uwa"]) : "";
                $id = isset($_POST["id"]) ? $_POST["id"] : "";
            }

            $zapytanie = "UPDATE instytucja set nazwa='$naz', telefon='$tel', email='$mail', adres='$ad', strona_internetowa='$str', uwagi='$uwa' where id='$id'";
            $wynik = mysqli_query($sql,$zapytanie);

            mysqli_close($sql);
        ?>
    </main>
    <footer style="margin-top: 750px;">
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>   
</body>
</html>