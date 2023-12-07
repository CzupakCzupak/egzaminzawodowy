<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header id="baner">
        <h1>Pensjonat pod dobrym humorem</h1>
    </header>
    <section id="lewy">
        <a href="index.html">GŁÓWNA</a>
        <img src="obraz1.jpg" alt="pokoje">
    </section>
    <section id="srodkowy">
        <a href="cennik.php">CENNIK</a>
        <table>
            <?php
        $conn = mysqli_connect('localhost','root','','wynajem');
        $zapytanie = mysqli_query($conn,'select * from pokoje');
        
        while($row = mysqli_fetch_array($zapytanie)){
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
        }

        mysqli_close($conn);

        ?>

        </table>
    </section>
    <section id="prawy">
        <a href="kalkulator.html">KALKULATOR</a>
        <img src="obraz3.jpg" alt="pokoje">
    </section>
    <footer id="stopka">
        <p>Stronę opracował: Patryk Czupak</p>
    </footer>
</body>
</html>