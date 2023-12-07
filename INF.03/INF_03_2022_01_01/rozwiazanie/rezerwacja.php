<body>
    <?php
    $con = mysqli_connect('localhost','root','','baza');
    if(isset($_POST['rezerwuj'])){
        $data = $_POST['data'];
        $os = $_POST['liczbaos'];
        $tel = $_POST['tel'];
        $kw = "insert into rezerwacje values(NULL,NULL,'$data','$os','$tel')";
        mysqli_query($con,$kw);
        echo "Dodano rezerwację do bazy";
    }

    mysqli_close($con);
    ?>
</body>