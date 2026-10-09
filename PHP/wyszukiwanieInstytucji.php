<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Niko">
    <title>Wyszukiwanie</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Wyszukiwarka</h1>
    </header>
    <main>
        <div class="box">
            <form action="wyszukiwanieInstytucji.php" method="POST">
                <label for="1">Nazwa instytucji: </label>
                <input type="text" name="nazinst" id="1"><br>
                <label for="2">Telefon: </label>
                <input type="text" name="tel" id="2"><br>
                <label for="3">E-mail: </label>
                <input type="text" name="mail" id="3"><br>
                <label for="4">Adres: </label>
                <input type="text" name="ad" id="4"><br>
                <label for="5">Strona internetpwa: </label>
                <input type="text" name="str" id="5"><br>
                <label for="6">Nazwisko osoby: </label>
                <input type="text" name="naz" id="6" required><br>
                <input type="submit" value="wyślij" class="dod">
                <input type="reset" value="Wyczyść formulaż" class="wycz">
            </form>
            <h3>Wynik</h2>
            <?php
                require_once './config.php';

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

                mysqli_close($sql)
            ?>
        </div>
    </main>
    <footer>
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>

</body>
</html>