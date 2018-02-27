<!doctype html>
<html lang="en">
<?php include 'head.html';?>
<body class="components-page">
<?php
session_start();
if(isset($_SESSION['usr']) AND !empty($_SESSION['usr'])){
   include 'nav1.html';
 }
 else{
   include 'nav.html';
 }
  if(isset($_GET['page'])){
  $page = $_GET['page'];
    switch($page){
      case 'login':
        include 'login.php';
        break;
      case 'logout':
        session_destroy();
        header("Location: index.php");
        break;
      case 'profile':
          include 'profil.php';
          break;
      case 'user':
              include 'user.php';
              break;
      case 'singup':
        include 'singup.php';
        break;
      case 'add':
        include 'add.php';
        break;
      case 'trajets':
      echo'<div class="page-header header-filter" style="background-image: url('."'./assets/img/bg.png'".');">';
      include 'trajets.php';
      echo'</div>';
        break;
      case 'strajets':
        echo'<div class="page-header header-filter" style="background-image: url('."'./assets/img/bg.png'".');">';
        include 'strajets.php';
        echo'</div>';
          break;
      default:
        break;
    }
  }
  else {
    include 'header.html';
    echo'<div class="main main-raised">
        <div class="section">';
    include 'trajets.php';
    echo'</div></div>';
  }
  ?>
</body>
<style>
.col-md-8.col-md-offset-2.text-center {
    background: white;
    padding: 50px;
}
.header-filter .container {
    padding-top: 22vh;
}
.page-header .title {
    font-weight: 700;
    font-family: "Roboto Slab", "Times New Roman", serif;
    line-height: 1.15em;
    color: #000;
}
</style>
<?php include 'footer.html';?>
</html>
