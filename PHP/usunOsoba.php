<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Niko">
    <title>Usuwanie osoby</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header style="width: 400px; margin-bottom: 40px;">
        <h1>Kogo chcesz <b style="color: red;">usunąć?</b></h1>
    </header>
    <main>
         <div class="prawo_ale_klasa zwykly_border" style="margin-right: 200px">
            <h2>Edycja</h2>
            <form action="usunOsoba.php" method="POST">
                <label for="1">Id: </label>
                <input type="number" name="id" id="1" placeholder="To pole wybiera osobę"><br>
                <input type="submit" value="Usuń" class="wycz">
            </form>
        </div>
        <?php 
            require_once './config.php';
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
                $obj = new usunOsoba;
                $obj->lista($sql);
            echo "</table>";
            mysqli_close($sql);
        ?>
    </main>
    <footer style="margin-top: 735px;">
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>
</body>
</html>