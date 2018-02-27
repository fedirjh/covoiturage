<style>
.header-filter .container {
    padding-top: 22vh;
}
</style>
<div class="page-header header-filter" style="background-image: url('./assets/img/bg.png');">
    <div class="container">
                    <div class="row">
                        <div class="col-md-8" id="crf">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Profile</h4>
                                    <p class="category">Complete ton profile</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <tr>
                                              <th>Départ</th>
                                              <th>Arrivée</th>
                                              <th>Heure de depart</th>
                                              <th>Jour de depart</th>
                                              <th>Telephone</th>
                                              <th>Prix</th>
                                            </tr>
                                          </thead>
                                        <tbody>
                                          <?php
                                          if ( !empty($_GET['usr'])) {
                                              $usr = $_GET['usr'];
                                          include 'connectdb.php';
                                          $pdo = Database::connect();
                                          $sql = "SELECT * FROM trajets WHERE usr='$usr'";
                                          foreach ($pdo->query($sql) as $row) {
                                          ?>
                                            <tr>
                                                <td><a href="?page=strajets&loc=<?php echo $row['dep']; ?>"><?php echo $row['dep']; ?></a></td>
                                                <td><a href="?page=strajets&loc=<?php echo $row['arr']; ?>"><?php echo $row['arr']; ?></a></td>
                                                <td><?php echo $row['tim']; ?></td>
                                                <td><?php echo $row['day']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td class="text-primary"><?php echo $row['prix']; ?> DT</td>
                                              <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="./assets/img/faces/marc.jpg">
                                    </a>
                                </div>
                                <div class="content">
                                <?php  $sql = "SELECT * FROM users WHERE usr='$usr'";
                                  foreach ($pdo->query($sql) as $row) {
                                  ?>
                                    <h6 class="category text-gray"><?php echo $row['nom']; ?></h6>
                                    <h4 class="card-title"><?php echo $usr; ?></h4>
                                    <h6 class="category text-gray"><?php echo $row['phone']; ?></h6>
                                    <h6 class="category text-gray"><?php echo $row['mail']; ?></h6>
                                    <h6 class="category text-gray"><?php echo $row['region']; ?></h6>
                                    <p class="card-content">
                                      <?php echo $row['bio']; ?>
                                    </p>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>

    </div>
</div>
<?php

Database::disconnect();
}
?>
