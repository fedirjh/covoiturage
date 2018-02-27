<?php
include 'connectdb.php';

if ( !empty($_POST)) {
    // keep track validation errors
    // keep track post values
    $nom = $_POST['nom'];
    $usr = $_POST['usr'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $psw = $_POST['psw'];


    // validate input
    $valid = true;

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (nom,usr,psw,mail,phone) values ('$nom', '$usr','$psw','$mail','$phone')";
        $q = $pdo->prepare($sql);
        $q->execute(array($nom,$usr,$psw,$mail,$phone));
        Database::disconnect();
        session_start();
        $_SESSION['usr']=$usr;
        header("Location: index.php");
        exit;
    }
}
else{
  include 'singup.html';
}
?>
