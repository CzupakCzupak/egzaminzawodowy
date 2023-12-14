<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkujemy</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <div id="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>
    <div id="lewy">
        <h2>Ryby drapieżne naszych wód</h2>
        <ul>
            <?php
            $conn = mysqli_connect('localhost','root','','wedkowanie');
            $zapytanie = mysqli_query($conn,"select nazwa,wystepowanie from ryby where ryby.styl_zycia = 1");

            while($row = mysqli_fetch_array($zapytanie)){
                echo "<li>$row[0], występowanie: $row[1],</li>";
            }

            mysqli_close($conn);
            ?>
        </ul>
    </div>
    <div id="prawy">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div id="stopka">
        <p>Stronę wykonał: Patryk Czupak</p>
    </div>
</body>
</html>