<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h1>BIURO TURYSTYCZNE</h1>
    </div>
    <div id="dane">
        <h3>Wycieczki na które są wolne miejsca</h3>
        <ul>

            <?php
        
        $conn = mysqli_connect('localhost','root','','biuro');
        $zapytanie = mysqli_query($conn,"SELECT id,datawyjazdu,cel,cena from wycieczki where dostepna = 1;");
        
        while($row = mysqli_fetch_array($zapytanie)){
            echo "<li>$row[0]. dnia $row[1] jedziemy do $row[2], cena: $row[3]</li>";
        }
        ?>
        </ul>
    </div>
    <div id="lewy">
        <h2>Bestselery</h2>
        <table>
            <tr><td>Wenecja</td>
            <td>kwiecień</td>
        </tr>
        <tr>
            <td>Londyn</td>
            <td>lipiec</td>
        </tr>
        <tr>
            <td>Rzym</td>
            <td>wrzesień</td>
        </tr>
    </table>
    </div>
    <div id="srodkowy">
        <h2>Nasze zdjęcia</h2>
        <?php
        $zapytanie2 = mysqli_query($conn, "SELECT nazwaPliku,podpis from zdjecia order by podpis desc;");

        while($row2 = mysqli_fetch_array($zapytanie2)){
            echo "<img src='$row2[0]' alt='$row2[1]'>";
        }

        mysqli_close($conn);
        ?>
    </div>
    <div id="prawy">
        <h2>Skontaktuj się</h2>
        <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </div>
    <div id="stopka">
        <p>Stronę wykonał: Patryk Czupak</p>
    </div>
</body>
</html>