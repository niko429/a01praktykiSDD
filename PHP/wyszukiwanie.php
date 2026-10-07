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
            <form action="wyszukiwanie.php" method="POST">
                <label for="1">Nazwisko: </label>
                <input type="text" name="naz" id="1" required><br>
                <label for="2">Telefon: </label>
                <input type="text" name="tel" id="2"><br>
                <label for="3">Instytucja: </label>
                <input type="text" name="inst" id="3"><br>
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
                    $naz = isset($_POST["naz"]) ? htmlspecialchars($_POST["naz"]) : "";
                    $tel = isset($_POST["tel"]) ? htmlspecialchars($_POST["tel"]) : "";
                    $inst = isset($_POST["inst"]) ? htmlspecialchars($_POST["inst"]) : "";

                    $zapytanie = "SELECT nazwisko, osoba.telefon, instytucja.nazwa from osoba inner join instytucja on instytucja.id = osoba.id like nazwisko = '$naz%' and osoba.telefon = '$tel' and instytucja.nazwa = '$inst'";
                    $wynik = mysqli_query($sql, $zapytanie);
                    $wynik1 = mysqli_fetch_row($wynik);
                    echo $wynik1[0]." ".$wynik1[1]." ".$wynik1[2];
                } else {
                    echo "<p>Jakimś cudem dostałeś ten komunikat.</p>";
                }

                mysqli_close($sql)
                    // Podpunkt 6.1.
                    // Zrobić to za pomocą input'ów text 
                    // Zapytanie 
                    // SELECT nazwisko, osoba.telefon, instytucja.nazwa from osoba inner join instytucja on instytucja.id = osoba.id where nazwisko = "Nikodem" and osoba.telefon = "348349758" and instytucja.nazwa = "firma"
                    // Tam gdzie pisze nazwisko = to ma być zmienna nazwiska gdzie będzie na końcu zmiennej procent żeby można było skrócić szybciej
                    // Tam gdzie pisze telefon = to ma być zmienna gdzie jest zawartość telefonu
                    // Tam gdzie pisze nazwa = to ma być zawartość nazwy instytucji
            ?>
        </div>
    </main>
    <footer>

    </footer>

</body>
</html>