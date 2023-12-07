<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<div id="baner"><h1>Portal Społecznościowy - moje konto</h1></div>
<div id="glowny">
    <h2>Moje zainteresowania</h2>
    <ul>
        <li>muzyka</li>
        <li>film</li>
        <li>komputery</li>
    </ul>
    <h2>Moi znajomi</h2>
    <?php
    $db = mysqli_connect('localhost','root','','dane');
    
    $zapytanie = mysqli_query($db,'select imie,nazwisko,opis,zdjecie from osoby where Hobby_id = 1 or Hobby_id = 2 or Hobby_id = 6');

    while($row = mysqli_fetch_row($zapytanie)){
        echo "<div class='zdjecie'>
        <img src='$row[3]' alt='przyjaciel'>
        </div>
        <div class='opis'>
        <h3>$row[0] $row[1]</h3>
        <p>Ostatni wpis: $row[2]</p>
        </div>
        <div class='linia'>
        <hr>
        </div>";
    }    
    
    mysqli_close($db);
    ?>
</div>
<div id="stopkalewy">Stronę wykonał: Patryk Czupak</div>
<div id="stopkaprawy"><a href="mailto:ja@portal.pl">napisz do mnie</a></div>
</body>
</html>