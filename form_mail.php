<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['wyslij'])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kierozoid@gmail.com';
    $mail->Password = 'wzseiskywebijgpa';
    $mail->SMTPSecure = 'ssl';

    $mail->setForm('kierozoid@gmail.com');

    $mail->addAdress($_POST['email']);

    $mail->isHTML(true);

    $mail->Subject = $_POST['temat'];
    $mail->Body = $_POST['wiadomosc'];
    $mail->send();
    
    echo
    "
    <script>
    alert('Wyslano Pomyslnie');
    document.location.href = 'mail_form.php';
    </script>";   // uzycie phpmailer do wysylania  przez uzytkownikow maila z tematem oraz wiadomoscia
}

if(isset($_POST['przypomnij'])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kierozoid@gmail.com';
    $mail->Password = 'wzseiskywebijgpa';
    $mail->SMTPSecure = 'ssl';

    $mail->addAdress($_POST['email']);

    $mail->isHTML(true);

    $mail->Subject = "Twoje hasło";
    $mail->Body = "Twoje hasło to $pass";
    $mail->send();
    
    $mailSend = True;
    header("Location: login.php"); // uzycie phpmailer do wysylania uzytkownikowi maila z przypomnieniem hasla
}
?>
