<?php
session_start();

if (isset($_SESSION['logon']) && $_SESSION['logon'] == True){ //sprawdzenie czy uzytkownik jest zalogowany
    echo '<h1>Pozdro, '.$_SESSION['login'].'</h1><br/><button><a href="logout.php">Wyloguj</a></button>'; //przycisk wylogowania po ktorego wcisnieciu wykonane jest przekierowanie do panelu logowania
}
?>
<div class="panel">
<form method="post" name='edytowanie'>
    <h2>Edytuj Podstrone</h2>
    <div><input type="text" name="tytul" value="Podaj tytuł strony"/></div>
    <div><input type="text" name="nowy_tytul" value="Podaj nowy tytuł strony"/></div>
    <div><textarea name="edytuj_content" value="Podaj nową zawartość podstrony"></textarea></div>
    <div><input type="submit" name="edycja" value="Edytuj"></div>
</form>
</div>
<?php
    function edytujPodstrone(){
        include('cfg.php');
        if(isset($_POST['tytul'])){
            $page_title = $_POST['tytul'];
            if(isset($_POST['nowy_tytul'])){
                $title = $_POST['nowy_tytul'];
                $content = $_POST['edytuj_content'];
                $query_2 = "UPDATE page_list SET page_title='$title', page_content='$content',
                status=1 WHERE page_title='$page_title";
                mysqli_query($link, $query_2);   // funkcja edycji podstrony ktora po wypelnieniu formularza zmienia nazwe strony w bazie danych
            }
        }
    }
?>
<?php
edytujPodstrone();
?>

<div class="panel">
<form method="post" name='dodawanie'>
    <h2>Dodaj Podstrone</h2>
    <div><input type="text" name="tytul" value="Podaj tytuł strony"/></div>
    <div><textarea name="dodaj_content" value="Podaj zawartość podstrony"></textarea></div>
    <div><input type="submit" name="edycja" value="Dodaj"></div>
</form>
</div>
<?php
    function dodajPodstrone(){
        include('cfg.php');
        if(isset($_POST['tytul'], $_POST['dodaj_content'])){
            $title = $_POST['tytul'];
            $content = $_POST['dodaj_content'];
            $status = 1;

            if(isset($_POST['edycja'])){
                $query_2 = "INSERT INTO page_list(page_title, page_content, status)
                VALUES('$title, $content, $status)";
                mysqli_query($link, $query_2); // funkcja wykorzystujaca zapytanie sql ktore po wypelnieniu formularza doda stronę do listy stron w bazie
            }
        }
    }
?>
<?php
    dodajPodstrone();
?>

<div class="panel">
<form method="post" name='usuwanie'>
    <h2>Usun Podstrone</h2>
    <div><input type="text" name="tytul" value="Podaj tytuł strony"/></div>
    <div><input type="submit" name="usuniecie" value="Usun"></div>
</div>
<?php
    function usunPodstrone(){
        include('cfg.php');
        if(isset($_POST['tytul'])){
            $page_title = $_POST['tytul'];
            if(isset($_POST['usuniecie'])){
                $query_2 = "DELETE FROM page_list WHERE page_title='$page_title'";
                mysqli_query($link, $query_2); // funkcja usuwajaca podstrone z uzyciem zapytania delete
            }
        }
    }
?>
<?php
    usunPodstrone();
?>
<?php
    function ListaPodstron(){
    include('cfg.php');
    $query_2 = "SELECT * FROM page_list WHERE status='1'";
    $result = mysqli_query($link, $query_2);
    while($row = mysqli_fetch_array($result))
        {
            echo  '<li> <b>ID:</b> '.$row['id'].' <b>Tytuł:</b> '.$row['page_title'].' <b>Status:</b> '.$row['status'].'<button>Edytuj</button> <button>Usun</button> </li>';

        }
        // wyswietlenie podstron w postaci listy, stron o statusie 1(w domysle aktywnych)
    }
?>
<?php
    ListaPodstron();
?>