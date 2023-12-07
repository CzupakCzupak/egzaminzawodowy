<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wizytówki</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h1>Wizytówki pracowników</h1>
        <form action="index.php" method='POST'>
            <input type="number" name="numb" id="" min='1' max='9' value='1'>
            <input type="submit" value="WYŚWIETL">
        </form>
    </div>
    <div id="wizytowka">
        <?php
        $conn = mysqli_connect('localhost','root','','firma');



        if(isset($_POST['numb'])){
            $id = $_POST['numb'];
            $zapytanie2 = mysqli_query($conn,"select id,imie,nazwisko,adres,miasto from pracownicy where id = $id ;");
         
            while($row2 = mysqli_fetch_array($zapytanie2)){
                echo "<img src='$row2[0].jpg' alt='pracownik'>";
                echo "<h2>$row2[1] $row2[2]</h2>";
                echo "<h4>Adres:</h4>";
                echo "<p>$row2[3],$row2[4]</p>";
            }
        }else{
            $zapytanie = mysqli_query($conn,"select id,imie,nazwisko,adres,miasto from pracownicy where id = 1;");

            while($row = mysqli_fetch_array($zapytanie)){
                echo "<img src='$row[0].jpg' alt='pracownik'>";
                echo "<h2>$row[1] $row[2]</h2>";
                echo "<h4>Adres:</h4>";
                echo "<p>$row[3],$row[4]</p>";
            }
        }
        ?>
    </div>
    <div id="stopka1">
        <img src="obraz.jpg" alt="pracownicy firmy">
    </div>
    <div id="stopka2">
        <p>Autorej wizytownika jest: Patryk Czupak</p>
        <a href="https://agencjareklamowa543.pl/" target='_blank'>Zobacz nasze realizacje</a>
    </div>
    <div id="stopka3">
        <p>Osoby proszone o podpisanie dokumentu RODO</p>
        <ol>

            <?php
        $zapytanie3 = mysqli_query($conn,"select imie,nazwisko from pracownicy where czyRODO = 0;");
        
        while($row3 = mysqli_fetch_array($zapytanie3)){
            echo "<li>$row3[0] $row3[1]</li>";
        }
        
        
        mysqli_close($conn);
        ?>
        </ol>
    </div>
</body>
</html>