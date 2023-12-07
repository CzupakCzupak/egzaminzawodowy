<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div class="baner-l">
        <h2>Nasze osiedle</h2>
    </div>
    <div class="baner-p">
        <?php
        $con = mysqli_connect('localhost','root','','portal');

        $wynik = mysqli_query($con,'SELECT count(*) FROM `dane`;');

        while($r = mysqli_fetch_array($wynik)){
            echo "<h5>Liczba użytkowników portalu: $r[0]</h5>";
        }
        
        ?>
    </div>
    <div class="blok-l">
        <h3>Logowanie</h3>
        <form action="uzytkownicy.php" method='POST'>
        <label for="login">login</label><br>
        <input type="text" name="login" id="login"><br>
        <label for="pass">hasło</label><br>
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" value="Zaloguj">
    </form>
    </div>
    <div class="blok-p">
        <h3>Wizytówka</h3>
        <?php
    
    if(isset($_POST['login']) && isset($_POST['pass'])){
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $res = mysqli_query($con,"select haslo from uzytkownicy where login = '$login';");

        if(mysqli_num_rows($res) != 0){
            while($r2 = mysqli_fetch_array($res)){
                $haslo = $r2[0];
            }
            if($haslo == sha1($pass)){
                $res2 = mysqli_query($con,"SELECT uzytkownicy.login, dane.rok_urodz,dane.przyjaciol,dane.hobby,dane.zdjecie from uzytkownicy inner join dane on uzytkownicy.id = dane.id where uzytkownicy.login = '$login';");
                while($r3 = mysqli_fetch_array($res2)){
                    echo "<div class='wizytowka'>";
                    echo "<img src='$r3[4]' alt='osoba'>";
                    $wiek = date('Y') - $r3[1];
                    echo "<h4>$r3[0] ($wiek)</h4>";
                    echo "<p>hobby: $r3[3]</p>";
                    echo "<h1><img src='icon-on.png'> $r3[2]</h1>";
                    echo "<a href='dane.html'><button type='button'>Więcej informacji</button></a>";
                    echo "</div>";
                }
            }else{
                echo "hasło nieprawidłowe";
            }
        }else{
            echo "login nie istnieje";
        }
    }
    mysqli_close($con);
    ?>
    
    </div>
    <div class="stopka">Stronę wykonał: Patryk Czupak</div>
</body>
</html>