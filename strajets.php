
        <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 text-center" style="padding: 20px;margin-bottom: 40px;">
                  <h2 class="title">Voici votre recherche</h2>
                  </div>
                  <?php
                  if ( !empty($_POST)) {
                  $dep = $_POST['dep'];
                  $arr = $_POST['arr'];
                  if(!empty($dep) && empty($arr)){
                    $arr=$dep;
                  }
                  if(empty($dep) && !empty($arr)){
                    $dep=$arr;
                  }
                  include 'connectdb.php';
                  $pdo = Database::connect();
                  $sql = "SELECT * FROM trajets WHERE dep LIKE '%$dep%' OR arr LIKE '%$arr%'";
                  foreach ($pdo->query($sql) as $row) {
                  ?>
                <div class="col-md-4">
                  <div class="card card-stats">
                                      <div class="card-header" data-background-color="green">
                                          <h3 class="title"><?php echo $row['prix']; ?> DT</h3>
                                      </div>
                                      <div class="card-content">
                                          <h3><?php echo $row['dep']; ?> - <?php echo $row['arr']; ?><p></p></h3>
                                          <h4><i class="material-icons">my_location</i> <a href="?page=strajets&loc=<?php echo $row['dep']; ?>"><?php echo $row['dep']; ?></a></h4>
                                          <h4><i class="material-icons">place</i> <a href="?page=strajets&loc=<?php echo $row['arr']; ?>"><?php echo $row['arr']; ?></a></h4>
                                          <h4><i class="material-icons">local_phone</i> <?php echo $row['phone']; ?></h4>
                                          <h4><i class="material-icons">person_pin</i><a href="?page=user&usr=<?php echo $row['usr']; ?>"><?php echo $row['usr']; ?></a></h4>

                                      </div>
                                      <div class="card-footer">
                                          <div class="stats">
                                              <i class="material-icons">date_range</i> <?php echo $row['tim']; ?> - <?php echo $row['day']; ?>
                                          </div>
                                      </div>
                                  </div>
              </div>
              <?php
              }
              Database::disconnect();
              }
              ?>
              <?php
              if ( !empty($_GET['loc'])) {
              $loc = $_GET['loc'];
              include 'connectdb.php';
              $pdo = Database::connect();
              $sql = "SELECT * FROM trajets WHERE dep LIKE '%$loc%' OR arr LIKE '%$loc%'";
              foreach ($pdo->query($sql) as $row) {
              ?>
              <div class="col-md-4">
              <div class="card card-stats">
                                  <div class="card-header" data-background-color="green">
                                      <h3 class="title"><?php echo $row['prix']; ?> DT</h3>
                                  </div>
                                  <div class="card-content">
                                      <h3><?php echo $row['dep']; ?> - <?php echo $row['arr']; ?><p></p></h3>
                                      <h4><i class="material-icons">my_location</i> <a href="?page=strajets&loc=<?php echo $row['dep']; ?>"><?php echo $row['dep']; ?></a></h4>
                                      <h4><i class="material-icons">place</i> <a href="?page=strajets&loc=<?php echo $row['arr']; ?>"><?php echo $row['arr']; ?></a></h4>
                                      <h4><i class="material-icons">local_phone</i> <?php echo $row['phone']; ?></h4>
                                      <h4><i class="material-icons">person_pin</i><a href="?page=user&usr=<?php echo $row['usr']; ?>"><?php echo $row['usr']; ?></a></h4>

                                  </div>
                                  <div class="card-footer">
                                      <div class="stats">
                                          <i class="material-icons">date_range</i> <?php echo $row['tim']; ?> - <?php echo $row['day']; ?>
                                      </div>
                                  </div>
                              </div>
              </div>
              <?php
              }
              Database::disconnect();
              }
              ?>

              <!-- end container -->
            </div>
            <!--  end col-md-8 -->
        </div>
        <style>
        i.material-icons {
          float: left;
        }
        .card-stats .card-content {
    text-align: center;
    padding-top: 10px;
}
.card-stats .card-header {
    float: left;
    text-align: center;
    padding: 25px;
}        </style>
        <!-- end row -->
