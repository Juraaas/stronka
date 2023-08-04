<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$baza = 'moja_strona';
$login = 'admin';
$pass = 'admin2';
$link = new mysqli($dbhost, $dbuser, $dbpass, $baza);

if($link->connect_errno != 0){
    throw new Exception(mysqli_connect_errno()); // blad wyswietlajacy sie po nieudanym polaczeniu z baza danych
}

?>