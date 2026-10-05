<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nikodem">
    <title>Projekt SDD</title>
    <link rel="stylesheet" href="./styl.css">
</head>
<body>
    <header>
        <h1>Projekt SDD</h1>
    </header>
    <main>

        <?php 
            // Zmienna sql przechowuje łączenie z dazą danych MySQL. Funkcja mysqli_connect przymuje do dokładniejszego określenia z jaką dazą danych się łączymy, pierwszy parametr to nazwa hosta, drugi to nazwa użytkownika, trzeci to hasło, a czwarty to nazwa bazy danych.
            if ($sql = mysqli_connect("localhost", "root", "", "a01baza"))
                // echo "<p>Połączenie z bazą danych powiodło się</p>";
            else
                echo "<p>Nie udało się podłączyć z bazą danych</p>";
            if ($SERVER["REQUEST_METHOD"] == "POST") {
                $imie = htmlspecialchars($_POST["imie"]);
                $naz = htmlspecialchars($_POST["naz"]);
                $tel = $_POST["tel"];
                $mail = htmlspecialchars($_POST["mail"]);
                $ad = htmlspecialchars($_POST["ad"]);
                $uwa = htmlspecialchars($_POST["uwa"]);
            }
            mysqli_close($sql);
        ?>
    </main>
    <footer>
        <p>Autor: Nikodem Napert</p>
    </footer>
</body>
</html>