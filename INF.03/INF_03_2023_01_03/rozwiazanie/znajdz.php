<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="baner"><h1>Grupa Polskich Kwiaciarni</h1></div>
    <div id="lewy">
        <h2>Menu</h2>
        <ol>
            <li><a href="index.html">Strona główna</a></li>
            <li><a href="https://www.kwiaty.pl/" target='_blank'>Rozpoznaj kwiaty</a></li>
            <li><a href="znajdz.php">Znajdź kwiaciarnię</a>
        <ul>
            <li>W Warszawie</li>
            <li>W Malborku</li>
            <li>W Poznaniu</li>
        </ul>
    </li>
        </ol>
    </div>
    <div id="prawy">
        <h2>Znajdź kwiaciarnię</h2>
        <form action="znajdz.php" method='POST'>
            <label for="nazwa">
                Podaj nazwę miasta:
                <input type="text" name="nazwa" id="">
            </label>
            <input type="submit" value="SPRAWDŹ">
            <?php
            $conn = mysqli_connect('localhost','root','','kwiaciarnia');

            if(isset($_POST['nazwa'])){
                $nazwa = $_POST['nazwa'];
                $zapytanie = mysqli_query($conn, "select nazwa,ulica from kwiaciarnie where miasto = '$nazwa';");
                
                while($row = mysqli_fetch_array($zapytanie)){
                    echo "<h3>$row[0], $row[1]</h3>";
                }

            }

            mysqli_close($conn);
            ?>
        </form>        
    </div>
    <footer id="stopka">
        <p>Stronę opracował: Patryk Czupak</p>
    </footer>
</body>
</html>