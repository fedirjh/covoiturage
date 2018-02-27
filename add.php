<?php
include 'connectdb.php';

if (!empty($_POST)) {
  // keep track validation errors
  // keep track post values
  $dep = $_POST['dep'];
  $arr = $_POST['arr'];
  $tim = $_POST['tim'];
  $prix = $_POST['prix'];
  $day = $_POST['day'];
  $phone = $_POST['phone'];
  session_start();
  $usr = $_SESSION['usr'];

  // validate input
  $valid = true;

  // insert data
  if ($valid) {
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO trajets (dep,arr,usr,tim,prix,day,phone) values ('$dep','$arr','$usr','$tim','$prix','$day','$phone')";
      $q = $pdo->prepare($sql);
      $q->execute(array($dep,$arr,$usr,$tim,$prix,$day,$phone));
      Database::disconnect();
      header("Location: index.php");
      exit;
  }
}
else{
  include 'add.html';
}
?>
