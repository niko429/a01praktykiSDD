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
            require_once './db.php';
            $obj = new lista_osoby_1;
            $obj->dane($sql);

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
                $obj->lista($sql);    
                echo "<tr>";
                    echo "<td colspan='7'><a href='./osoby.php'>Filtrowanie od najmniejszej względem ID</a></td>";
                echo "</tr>";
            echo "</table>";

            echo "<table class='prawo_ale_klasa''>";
                echo "<tr>";
                    echo "<th class='podswietlenie'>Id</th>";
                    echo "<th class='podswietlenie'>Imię</th>";
                    echo "<th class='podswietlenie'>Nazwa instytucji</th>";
                echo "</tr>";
                $obj->lista1($sql);
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