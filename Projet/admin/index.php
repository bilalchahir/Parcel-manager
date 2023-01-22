<?php 
  $title = "Acceuil";
  require_once '../includes/header.php';
  if(isset($_GET['code'])){
    $code = $_GET['code'];
    $pdo->exec("UPDATE colis.coli SET recu = 1, dateReceive = now()  WHERE code = $code");
}
    $sql = $pdo->query("SELECT * FROM COLIs.coli c, colis.categorie ca, colis.package p where (c.categorie = ca.id and c.package = p.id)");
    $colis = $sql->fetchAll();
    $sql = $pdo->query("SELECT * FROM COLIS.package");
    $packages = $sql->fetchAll();
    $sql = $pdo->query("SELECT * FROM COLIS.categorie");
    $categories = $sql->fetchAll();
  ?>
<aside>
    <div class="top">
        <div class="logo">
            <img src="../images/icons8-boîte-en-carton-64.png">
            <h2 class="text-muted">Trier<span class="danger"> Ici</span></h2>
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
        </div>
    </div>

    <div class="sidebar">
        <a href="index.php" class="active">
            <span class="material-icons-sharp">home</span>
            <h3>Acceuil</h3>
        </a>
        <a href="ajouter.php">
            <span class="material-icons-sharp">add_circle_outline</span>
            <h3>Ajouter Coli</h3>
        </a>
        <a href="parametre.php">
            <span class="material-icons-sharp">settings</span>
            <h3>Paramètres</h3>
        </a>
        <a href="../admin/logout.php">
            <span class="material-icons-sharp">logout</span>
            <h3>Déconnecter</h3>
        </a>
    </div>

</aside>
<main>
    <h1>Trier</h1>
    <div class="num-coli">
        <h5 class="text-muted">Mots clé</h5>
        <input type="text" id="key" placeholder="Entrer code, ville, quartier, poids ... " />
    </div>
    <select id="package">
        <option value="%">Tous les packages</option>
        <?php foreach ($packages as $package){
      echo "<option value='$package[id]' >$package[nom] : L $package[largeur], W $package[longueur], H $package[hauteur]</option>";
    }
    ?>
    </select>
    <select id="categorie">
        <option value="%">Touts les catégorie</option>
        <?php foreach ($categories as $categorie){
      echo "<option value='$categorie[id]'>$categorie[nom]</option>";}
    ?>
    </select>
    <div class="information-board">
        <h2 class="text-muted">Liste des colis</h2>
        <div id="container">
            <table border="2">
                <tr>
                    <th>Code</th>
                    <th>Expéditeur</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Emétteur</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Date d'envoi</th>
                    <th>Date reçu</th>
                    <th>Poids</th>
                    <th>Sensible</th>
                    <th>Catégorie</th>
                    <th>Package</th>
                    <th>Reçu</th>
                    <th>Details</th>
                </tr>
                <?php foreach($colis as $coli){?>
                <tr>
                    <td><?php echo($coli['code']);?></td>
                    <td><?php echo($coli['fullNameSender']);?></td>
                    <td><?php echo($coli['villeSender']);?></td>
                    <td><?php echo($coli['adresseSender']);?></td>
                    <td><?php echo($coli['fullNameReceiver']);?></td>
                    <td><?php echo($coli['villeReceiver']);?></td>
                    <td><?php echo($coli['rue']. " ". $coli['quartier']. " " .$coli['villeReceiver']);?></td>
                    <td><?php echo($coli['dateSend']);?></td>
                    <td><?php if($coli['recu']==false)echo("Pas encore");else echo($coli['dateReceive']);?></td>
                    <td><?php echo($coli['poids']);?></td>
                    <td><?php echo($coli['sensible']);?></td>
                    <td><?php echo($coli[24]);?></td>
                    <td><?php echo($coli[26]);?></td>
                    <td><?php if($coli['recu']==false)echo("Pas encore");else echo("Reçu");?></td>
                    <td><a href="../consulter.php?code=<?php echo($coli[1])?>">Details</a> <a
                            href="index.php?code=<?php echo($coli[1])?>">Reçu</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <!--End of insights-->
</main>
<!-------Enf of main------->
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#key").on("keyup", function() {
        var key = $(this).val();
        var package = $("#package").val();
        var categorie = $("#categorie").val();
        $.ajax({
            url: "filter.php",
            method: "POST",
            data: {
                key: key,
                package: package,
                categorie: categorie
            },
            success: function(data) {
                $("#container").html(data);
            }

        });
    });

    $("#categorie").on('change', function() {
        var categorie = $(this).val();
        var key = $("#key").val();
        var package = $("#package").val();
        $.ajax({
            url: "filter.php",
            method: "POST",
            data: {
                package: package,
                key: key,
                categorie: categorie
            },
            success: function(data) {
                $("#container").html(data);
            }

        });
    });
    $("#package").on('change', function() {
        var package = $(this).val();
        var key = $("#key").val();
        var categorie = $("#categorie").val();
        $.ajax({
            url: "filter.php",
            method: "POST",
            data: {
                package: package,
                key: key,
                categorie: categorie
            },
            success: function(data) {
                $("#container").html(data);
            }

        });
    });
});
</script>
</body>

</html>