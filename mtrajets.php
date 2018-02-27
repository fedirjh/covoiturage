<?php
include 'connectdb.php';
$pdo = Database::connect();
if ( !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM trajets WHERE id='$id'";
    $pdo->query($sql) ;
}
?>

<div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Mes Trajets</h4>
                                    <p class="category">Liste complete de vos trajets</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <tr>
                                              <th>Départ</th>
                                              <th>Arrivée</th>
                                              <th>Heure de depart</th>
                                              <th>Jour de depart</th>
                                              <th>Prix</th>
                                              <th>Supprimer</th>
                                            </tr>
                                          </thead>
                                        <tbody>
                                          <?php
                                          session_start();
                                          $usr = $_SESSION['usr'];
                                          $sql = "SELECT * FROM trajets WHERE usr='$usr'";
                                          foreach ($pdo->query($sql) as $row) {
                                          ?>
                                            <tr>
                                                <td><a href="?page=strajets&loc=<?php echo $row['dep']; ?>"><?php echo $row['dep']; ?></a></td>
                                                <td><a href="?page=strajets&loc=<?php echo $row['arr']; ?>"><?php echo $row['arr']; ?></a></td>
                                                <td><?php echo $row['tim']; ?></td>
                                                <td><?php echo $row['day']; ?></td>
                                                <td class="text-primary"><?php echo $row['prix']; ?> DT</td>
                                                <td><button onclick="doCORSRequest({method: 'GET',url: 'mtrajets.php?id=<?php echo $row['id']; ?>',}, function printResult(result) {document.getElementById('crf').innerHTML = '';postscribe('#crf',result);});" class="btn btn-primary btn-round"><i class="material-icons">delete</i></button></td>
                                            </tr>
                                            <?php
                                            }
                                            Database::disconnect();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
