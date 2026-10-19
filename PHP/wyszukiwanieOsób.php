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
                require_once './config.php';
                require_once './db.php';

                $obj = new wyszOsob;
                $obj->wyszukiwanie($sql);

                mysqli_close($sql);
            ?>
        </div>
    </main>
    <footer>
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>

</body>
</html>