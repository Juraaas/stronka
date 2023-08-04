<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Piłka nożna moją pasją</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<section class="header">
    <nav>
        <a href="index.html"><img class='image_logo' src="images/logo.png"></a>
        <div class="nav-links">
            <ul>
                <li><a href="index.php?page=stronka">HOME</a></li>
                <li><a href="index.php?page=about">ABOUT</a></li>
                <li><a href="index.php?page=mecze">MATCHES</a></li>
                <li><a href="index.php?page=skroty">HIGHLIGHTS</a></li>
                <li><a href="index.php?page=galeria">GALLERY</a></li>
                <li><a href="index.php?page=sklep">SHOP</a></li>
                <li><a href="index.php?page=kontakt">CONTACT</a></li>
            </ul>
        </div>
    </nav>
</section>
<section class="footer">
    <h4>O nas</h4>
    <p>Serwis Internetowy poświęcony klubowi piłkarskiemu Arsenal FC i jego sympatykom</p>
</section>

<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
include ('cfg.php');
include ('showpage.php');
$nazwa = $_GET['page'];
if($nazwa != NULL) 
    {
        PokazPodstrone($nazwa); 
}
?>

<?
 $nr_indeksu = ‘162642’;
 $nrGrupy = ‘4’;
 echo ‘Autor: Jakub Jurewicz ‘.$nr_indeksu.’ grupa ‘.$nrGrupy.’ <br /><br />’;
?>

</body>
</html>