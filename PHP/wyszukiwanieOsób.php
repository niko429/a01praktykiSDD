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
            <form action="wyszukiwanieOsób.php" method="POST">
                <label for="1">Imie: </label>
                <input type="text" name="imie" id="1" required><br>
                <label for="2">Nazwisko: </label>
                <input type="text" name="naz" id="2"><br>
                <label for="3">Telefon: </label>
                <input type="text" name="tel" id="3"><br>
                <label for="4">E-mail: </label>
                <input type="text" name="mail" id="4"><br>
                <label for="5">Adres: </label>
                <input type="text" name="ad" id="5"><br>
                <label for="6">Nazwa instytucji: </label>
                <input type="text" name="naz1" id="6"><br>
                <label for="7">Rola</label>
                <input type="text" name="rola" id="7"><br>
                <input type="submit" value="wyślij" class="dod">
                <input type="reset" value="Wyczyść formulaż" class="wycz">
            </form>
            <h3>Wynik</h2>
            <?php
                if ($sql = mysqli_connect('localhost','root','','a01baza')){
                    // echo "Udało się podłączyć z bazą danych";
                } else {
                    echo "Nie udało się podłączyć".mysqli_error();
                }

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

                mysqli_close($sql);
            ?>
        </div>
    </main>
    <footer>
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>

</body>
</html>