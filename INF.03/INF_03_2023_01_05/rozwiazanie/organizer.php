<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="baner1">
        <h1>Organizer: SIERPIEŃ</h1>
    </div>
    <div id="baner2">
        <form action="organizer.php" method='POST'>
            <label for="zapisz">
                Zapisz wydarzenie:
                <input type="text" name="zapisz" id="">
            </label>
            <input type="submit" value="OK">
        </form>
    </div>
    <div id="baner3">
        <img src="logo2.png" alt="sierpień">
    </div>
    <div id="glowny">
    <?php
    $conn = mysqli_connect('localhost','root','','kalendarz');

    $zapytanie = mysqli_query($conn,"select dataZadania,wpis from zadania where miesiac = 'sierpien'");

    while($row = mysqli_fetch_array($zapytanie)){
        echo "<section class='kalendarz'>
        <h5>$row[0]</h5>
        <p>$row[1]</p>
        </section>";
    }


    if(isset($_POST['zapisz'])){
        $wpis = $_POST['zapisz'];
        $zapytanie = mysqli_query($conn,"update zadania set wpis = '$wpis' where dataZadania = '2020-08-09';");
    }

    mysqli_close($conn);
    ?>
    </div>
    <div id="stopka">
        <p>Strone wykonał: Patryk Czupak</p>
    </div>
    
</body>
</html>