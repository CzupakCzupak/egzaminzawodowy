<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="lewy">
        <h1>Akta Pracownicze</h1>
        <?php
        $conn = mysqli_connect('localhost','root','','firma');

        $zapytanie1 = mysqli_query($conn,'select imie,nazwisko,adres,miasto,czyRODO,czybadania from pracownicy where id = 2;');
        while($row = mysqli_fetch_array($zapytanie1)){
            echo "<h3>dane</h3>";
            echo "<p>$row[0] $row[1]</p>";
            echo "<hr>";
            echo "<h3>adres</h3>";
            echo "<p>$row[2]</p>";
            echo "<p>$row[3]</p>";
            echo "<hr>";
            $czyrodo = $row[4];
            if($czyrodo == 1){
                echo "<p>RODO: podpisano</p>";
            }else{
                echo "<p>RODO: niepodpisano</p>";

            }
            $badania = $row[5];
            if($badania == 1){
                echo "<p>Badania: aktualne</p>";
            }else{
                echo "<p>Badania: nieaktualne</p>";
            }
        }
        ?>
        <hr>
        <h3>Dokumenty pracownika</h3>
        <a href="cv.txt">Pobierz</a>
        <h1>Liczba zatrudnionych pracowników</h1>
        <?php
        $zapytanie2 = mysqli_query($conn,'select count(*) from pracownicy');

        while($row2 = mysqli_fetch_array($zapytanie2)){
            echo "<p>$row2[0]</p>";
        }
        ?>
    </div>
    <div id="prawy">
        <?php
        $zapytanie3 = mysqli_query($conn,"select id,imie,nazwisko from pracownicy where id = 2;");

        while($row3 = mysqli_fetch_array($zapytanie3)){
            echo "<img src='$row3[0].jpg' alt='pracownik'>";
            echo "<h2>$row3[1] $row3[2]</h2>";
        }

        $zapytanie4 = mysqli_query($conn,"select pracownicy.id,stanowiska.opis,stanowiska.nazwa from pracownicy inner join stanowiska on pracownicy.stanowiska_id = stanowiska.id where pracownicy.id = 2;");

        while($row4 = mysqli_fetch_array($zapytanie4)){
            echo "<h4>$row4[2]</h4>";
            echo "<h5>$row4[1]</h5>";
        }


        mysqli_close($conn);
        ?>
    </div>
    <div id="stopka">
        Autorem aplikacji jest: Patryk Czupak
        <ul>
            <li>skontaktuj się</li>
            <li>poznaj naszą firmę</li>
        </ul>
    </div>
</body>
</html>