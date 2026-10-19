<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nikodem">
    <title>Lista instytucji</title>
    <link rel="stylesheet" href="../CSS/styl.css">
</head>
<body>
    <header>
        <h1>Lista inst.</h1>
    </header>
    <main>
        <?php 
            require_once './config.php';
            require_once './db.php';
            
            $obj = new lista_inst;
            $obj->dane($sql);
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
                $obj->lista($sql);
                echo "<tr>";
                    echo "<td colspan='7'><a href='./instytucja1.php'>Filtrowanie od największej względem ID</a></td>";
                echo "</tr>";
            echo "</table>";

            echo "<table class='prawo_ale_klasa''>";
                echo "<tr>";
                    echo "<th class='podswietlenie'>Id</th>";
                    echo "<th class='podswietlenie'>Nazwa instytucji</th>";
                    echo "<th class='podswietlenie'>Imię</th>";
                echo "</tr>";
                   $obj->lista1($sql);
            echo "</table>";    
            mysqli_close($sql);
        ?>
        <div style="display: flex;">
            <h2 style="width: 100px;"><a href="./edycjaInstytucji.php" style="text-decoration: none;">Edycja?</a></h2>
            <h2 style="width: 100px;"><a href="./usunInstytucja.php" style="text-decoration: none;">Usunąć?</a></h2>
        </div>
        
    </main>
    <footer>
        <p>Autor: Nikodem Naperty. <a href="../HTML/start.html">Powrót do głównej strony?</a></p>
    </footer>
</body>
</html>