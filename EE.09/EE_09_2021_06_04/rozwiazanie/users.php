<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header id="baner"><h3>Portal Społecznościowy - panel administratora</h3>
    </header>
    <div id="lewy">
        <h4>Użytkownicy</h4>
    <?php

$baza = mysqli_connect('localhost','root','','dane4');
$year = date("Y");
$zapytanie = mysqli_query($baza,'select id,imie,nazwisko,rok_urodzenia,zdjecie from osoby limit 30;');
while($row = mysqli_fetch_row($zapytanie)){
    $age = $year - $row[3];
    echo "$row[0]. $row[1] $row[2], $age lat,</br>";
}
mysqli_close($baza)
?>
<a href="settings.html">Inne ustawienia</a>
    </div>
    <div id="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action='users.php' method='POST'>
            <input type="number" name="number" id="number">
            <input type="submit" value="ZOBACZ">
        </form>
        <hr>
        <?php
$baza = mysqli_connect('localhost','root','','dane4');

    if(isset($_POST['number'])){
        $id = $_POST['number'];
        $zapytanie2 = "select osoby.imie,osoby.nazwisko,osoby.zdjecie,osoby.rok_urodzenia,osoby.opis,hobby.nazwa from osoby inner join hobby on osoby.id = hobby.id where osoby.id = $id";
        $wynik = mysqli_query($baza,$zapytanie2);
        while($row = mysqli_fetch_row($wynik)){
            echo "<h2>$id. $row[0] $row[1]</h2>";
            echo "<img src='$row[2]' alt='$id'>";
            echo "<p>Rok urodzenia: $row[3]</p>";
            echo "<p>Opis: $row[4]</p>";
            echo "<p>Hobby: $row[5]</p>";
        }
    }
    mysqli_close($baza)
    
    ?>
    </div>
    <div id="stopka">Strone wykonał: Patryk Czupak</div>

</body>
</html>