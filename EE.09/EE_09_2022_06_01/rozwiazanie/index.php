<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>Forum miłośników psów</h1>
    </div>
    <div id="lewy">
        <img src="avatar.png" alt="Użytkownik forum">
        <?php
        $conn = mysqli_connect('localhost','root','','forumpsy');

        $zapytanie = mysqli_query($conn,"select konta.nick, konta.postow,pytania.pytanie from konta INNER JOIN pytania on konta.id = pytania.konta_id where konta.id = 1;");

        while($row = mysqli_fetch_array($zapytanie)){
            echo "<h4>$row[0]</h4>
            <p>$row[1] postów na forum</p>
            <p>$row[2]</p>";
        }
        ?>    
        <video src="video.mp4" controls loop></video>
    </div>
    <div id="prawy">
        <form action="index.php" method='POST'>
            <textarea name="odp" id="odp" cols="40" rows="4"></textarea><br>
            <input type="submit" value="Dodaj odpowiedź">
        </form>
        <?php
        if(isset($_POST['odp']) && $_POST['odp'] != ''){
            $odp = $_POST['odp'];
            $zapytanie2 = mysqli_query($conn,"insert into odpowiedzi values('','1','5','$odp');");
        }   
        ?>
        <h2>Odpowiedzi na pytanie</h2>
        <ol>        
        <?php
        $zapytanie3 = mysqli_query($conn,"SELECT odpowiedzi.id,odpowiedzi.odpowiedz,konta.nick from odpowiedzi inner join konta on odpowiedzi.konta_id = konta.id where odpowiedzi.Pytania_id = 1;");

        while($row2 = mysqli_fetch_array($zapytanie3)){
            echo "<li>$row2[1] <i>$row2[2]</i> <hr></li>";
        }
        ?>
        </ol>
    </div>
    <div id="stopka">
        Autor: Patryk Czupak,
        <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
    </div>
</body>
</html>