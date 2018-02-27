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
                                <div class="card-content">
                                    <form method="post" action="update.php">
                                        <div class="row">
                                          <?php
                                          session_start();
                                          $usr = $_SESSION['usr'];
                                          include 'connectdb.php';
                                          $pdo = Database::connect();
                                          $sql = "SELECT * FROM users WHERE usr='$usr'";
                                          foreach ($pdo->query($sql) as $row) {
                                          ?>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Pseudo</label>
                                                    <input type="text" name="usr" value="<?php echo $usr; ?>" class="form-control" disabled>
                                                <span class="material-input"></span></div>
                                            </div><div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nom</label>
                                                    <input type="text" name="nom" value="<?php echo $row['nom']; ?>" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email address</label>
                                                    <input type="email" name="mail" value="<?php echo $row['mail']; ?>" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Mot de Pass</label>
                                                    <input type="text" name="psw" value="<?php echo $row['psw']; ?>" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Telephone</label>
                                                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Region</label>
                                                    <input type="text" name="region" value="<?php echo $row['region']; ?>" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>A propos</label>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Simple Description</label>
                                                        <textarea class="form-control" name="bio"rows="5"><?php echo $row['bio']; ?></textarea>
                                                    <span class="material-input"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
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
                                    <h6 class="category text-gray">CEO / Co-Founder</h6>
                                    <h4 class="card-title"><?php echo $row['nom']; ?></h4>
                                    <p class="card-content">
                                      <?php echo $row['bio']; ?>
                                    </p>
                                    <div id='link'>
                                      <script>
                                      var link='<a href="http://rjh/co/documentation/index.php?page=profile" class="btn btn-primary btn-round">Mon Profil</a>';
                                      </script>
                                    <button onclick="doCORSRequest({method: 'GET',url: 'mtrajets.php',}, function printResult(result) {document.getElementById('crf').innerHTML = '';postscribe('#crf',result);document.getElementById('link').innerHTML = '';postscribe('#link',link);});" class="btn btn-primary btn-round">Mes trajets</button>
                                </div></div>
                            </div>
                        </div>
                    </div>

    </div>
</div>
<?php
}
Database::disconnect();
?>
