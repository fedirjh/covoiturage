<?php

include 'connectdb.php';

if ( !empty($_POST)) {
          // keep track validation errors
          // keep track post values
          $usr = $_POST['usr'];
          $psw = $_POST['psw'];

          // validate input
          $valid = true;

          // insert data
          if ($valid) {
            include 'database.php';
          				$pdo = Database::connect();
          				$sql = "SELECT * FROM users WHERE usr='$usr' AND psw='$psw'";
                  $res = $pdo->query($sql);
          						if($res->fetchColumn() > 0){
                        session_start();
                        var_dump($_SESSION);
                        $_SESSION['usr'] = $usr;
                        header("Location: index.php");
                        exit;
                      }
                      else{
                        header("Location: index.php?page=login&state=false");
                      }
          				Database::disconnect();
          }
}
else{
          if(isset($_GET['state'])){
            if($_GET['state']=='false'){
              echo'
              <div class="page-header header-filter" style="background-image: url('."'./assets/img/bg.png'".');">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-8 col-md-offset-2 text-center">
                              <h3 class="title ">Connecter vous</h3>
                              <div class="alert alert-danger">
                              <span>Voulez vous verifier vos login</span>
                              </div>
                              <form method="post" action="login.php">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <input type="text" name="usr" placeholder="Pseudo" class="form-control">
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="password" name="psw" placeholder="Mot de passe" class="form-control">
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <button type="submit" class="col-sm-12 btn btn-rose btn-fill">Se connecter</button>
                              </div>
                            </form>
                          </div>
                      </div>
                  </div>
              </div>
            ';
          }
        }
          else{
            include 'login.html';
          }
}
?>
