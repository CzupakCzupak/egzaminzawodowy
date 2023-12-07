<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <div class="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>
    <div class="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
            <?php
            $con = mysqli_connect('localhost','root','','wedkowanie');
            $skrypt1 = mysqli_query($con,"SELECT ryby.nazwa,lowisko.akwen,lowisko.wojewodztwo from ryby inner join lowisko on ryby.id = lowisko.Ryby_id where lowisko.rodzaj = '3';");
            while($res = mysqli_fetch_array($skrypt1)){
                echo "<li>$res[0] pływa w rzece $res[1], $res[2]</li>";
            }
            
            ?>
            
        </ol>
    </div>

    <div class="prawy">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div class="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr><th>L.p.</th><th>Gatunek</th><th>Występowanie</th></tr>
            <?php
            $skrypt2 = mysqli_query($con,"SELECT id,nazwa,wystepowanie from ryby where styl_zycia = 1;");
            while($res2 = mysqli_fetch_array($skrypt2)){
                echo "<tr><td>$res2[0]</td><td>$res2[1]</td><td>$res2[2]</td></tr>";
            }
    mysqli_close($con);

            ?>
        </table>
    </div>
    <div class="stopka"><p>Stronę wykonał: Patryk Czupak</p></div>
</body>
</html>