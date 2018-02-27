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
    $bio = $_POST['bio'];
    $region = $_POST['region'];

    // validate input
    $valid = true;

    // insert data
    if ($valid) {
      session_start();
      $usr = $_SESSION['usr'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE users SET nom = '$nom',usr = '$usr',bio = '$bio',region = '$region',psw = '$psw',mail = '$mail',phone = '$phone' WHERE usr = '$usr'";
        $q = $pdo->prepare($sql);
        $q->execute(array($nom,$usr,$bio,$region,$psw,$mail,$phone));
        Database::disconnect();
        header("Location: index.php?page=profile");
        exit;
    }
}
else{
  header("Location: index.php?page=profile");
  exit;
}
?>
