<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="baner">
        <h1>Hurtownia spożywcza</h1>
    </div>
    <div id="glowny">
        <h2>Opinie naszych klientów</h2>
        <?php
        $conn = mysqli_connect('localhost','root','','hurtownia');

        $zapytanie = mysqli_query($conn,"
SELECT klienci.zdjecie,klienci.imie,opinie.opinia from klienci inner join opinie on klienci.id = opinie.Klienci_id inner join typy on klienci.Typy_id = typy.id where typy.id = 2 or typy.id = 3;");


        while($row = mysqli_fetch_array($zapytanie)){
            echo "<div class='opinia'>
            <img src='$row[0]' alt='klient'>
            <blockquote>$row[2]</blockquote>
            <h4>$row[1]</h4>
            </div>";
        }
        ?>
    </div>
    <div id="stopka1">
        <h3>Współpracują z nami</h3>
        <a href="https://sklep.pl/">Sklep 1</a>
    </div>
    <div id="stopka2">
        <h3>Nasi top klienci</h3>
        <ol>
        <?php
        $zapytanie2 = mysqli_query($conn, "select imie,nazwisko,punkty from klienci order by punkty desc limit 3;");    

        while($row2 = mysqli_fetch_array($zapytanie2)){
            echo "<li>$row2[0] $row2[1], $row2[2]</li>";
        }

        mysqli_close($conn);
        ?>
        </ol>
    </div>
    <div id="stopka3">
        <h3>Skontaktuj się</h3>
        <p>telefon: 111222333</p>
    </div>
    <div id="stopka4">
        <h4>Autor: Patryk Czupak</h4>
    </div>
</body>
</html>