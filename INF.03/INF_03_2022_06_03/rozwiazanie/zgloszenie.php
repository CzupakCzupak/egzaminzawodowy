<?php
$conn = mysqli_connect('localhost','root','','wedkarstwo');

$sedzia = $_POST['sedzia'];
$lowisko = $_POST['lowisko'];
$data = $_POST['data'];

$zapytanie = mysqli_query($conn,"INSERT INTO zawody_wedkarskie VALUES('','0','$lowisko','$data',' $sedzia');");

mysqli_close($conn);

?>
