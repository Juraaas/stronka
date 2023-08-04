<?php
session_start();

if (isset($_POST['login']) && isset($_POST['pass'])){ // sprawdzenie przejscia przez panel logowania
    if(strlen($_POST['login']) < 3 || strlen($_POST['pass']) < 3){ //dodtakowy warunek na dlugosc loginu i hasla
        $_SESSION['error'] = "Za krotkie dane";
        header('Location: login.php');
        exit();
    }
    else{
        $login = ($_POST['login']);
        $pass = $_POST['pass'];
        try {
            $link2 = new mysqli('localhost', 'root', '', 'moja_strona'); //polaczenie z baza danych

            if($link2->connect_errno != 0){
                throw new Exception(mysqli_connect_errno());
            }
            else{
                if($reply = mysqli_query($link2, "SELECT * FROM users WHERE login='$login'")){ //wyslanie zapytania o uzytkownika z danym loginem wpisanym w formularzu
                    if($reply->num_rows > 0){
                        $row = $reply->fetch_assoc();
                        if($row['pass'] == $pass){ // przy pomyslnym sprawdzeniu uzytkownika sprawdzane jest haslo
                            $_SESSION['logon'] = True;
                            $_SESSION['login'] = $row['login'];  //ustawienie danych sesyjnych i przekierowanie na panel admina
                            $link2->close();
                            header('Location: admin.php');
                            exit();
                        }
                        else{
                            $_SESSION['error'] = "Dana sa nieprawidlowe"; // blad wyskakujacy przy zlym wpisaniu danych
                            header('Location: login.php');
                            exit();
                        }
                    }
                    else{
                        $_SESSION['error'] = "Dane sa nieprawidlowe"; //blad wyskakujacy przy zlym wpisaniu danych
                    header('Location: login.php');
                    exit();
                    }    
                }
                else{
                    $_SESSION['error'] = "Blad zapytania"; //blad zapytania do bazy danych
                    header('Location: login.php');
                    exit();
                }
            }
        }
        catch(Exception $e) {
            echo 'Blad bazy danych';
        }
    }
}
else{
    $_SESSION['error'] = "Wprowadz dane";
    header('Location: login.php');
    exit();  // przy braku wprowadzenia danych przekierowanie spowrotem na strone logowania i wyrzucenie bledu o braku danych
}
?>
