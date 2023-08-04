<?php
session_start();

if(isset($_SESSION['logon']) && $_SESSION['logon'] == True){ // sprawdzanie czy jestesmy zalogowani, jezeli tak to nie bedzie nam sie wyswietlal juz panel logowania, bo zostanie wykonane przekierowanie na panel po zalogowaniu
    header('Location: admin.php'); 
}
?>
<html>
<head>
    <title> Panel Logowania </title>
</head>
<body>

<div id="imagination_v2">

<form method="post" action="logowanie.php"> 
    <h2> Zaloguj się </h2>
    <div><input type="text" name="login" placeholder="Login"/></div>
    <div><input type="password" name="pass" placeholder="Hasło"/></div>
    <div><input type="submit" value="Zaloguj"/></div>
</form>
</div>
<?php
    if(isset($_SESSION['error'])){   // jesli istnieje zmienna sesyjna error, to wyswietla sie jej komunikat nastepnie usuwa ja zeby po odswiezeniu przegladarki blad zniknal
        echo '<span style="color: red; font-weight: bold">'.$_SESSION['error'].'</span>';
        unset($_SESSION['error']);
    }
?>

</body>
</html>