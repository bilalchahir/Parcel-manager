<?php 
  $title = "Nouveau-Colis";
  require_once '../includes/header.php';
  $pdo2 = $pdo;
  $sql = $pdo->query("SELECT * FROM COLIS.package");
  $types = $sql->fetchAll();
  $sql = $pdo->query("SELECT * FROM COLIS.categorie");
  $categories = $sql->fetchAll();

  if(isset($_POST['ajouter'])){
        $cinS = $_POST['cinS']; $nameS = $_POST['fullNameS'];$villeS = $_POST['villeS']; $adresseS = $_POST['adresseS']; $emailS = $_POST['emailS']; $phoneS = $_POST['phoneS'];
        $cinR = $_POST['cinR']; $nameR = $_POST['fullNameR']; $emailR = $_POST['emailR'];$phoneR = $_POST['phoneR'];
        $villeR = $_POST['villeR']; $codePostal = $_POST['codePostal']; $quartier = $_POST['quartier']; $rue = $_POST['rue'];
        $sensible = $_POST['sensible']; $poids = $_POST['poids']; $package = $_POST['package']; $Categorie = $_POST['categorie'];
        $code = rand();

        $sql = "INSERT INTO colis.coli(`code`, `cinSender`, `fullNameSender`, `villeSender`,
         `adresseSender`, `emailSender`, `phoneSender`, `cinReceiver`, `fullNameReceiver`,
          `emailReceiver`, `phoneReceiver`, `villeReceiver`, `quartier`, `rue`, `codePostale`,
           `poids`, `sensible`, `dateSend`, `categorie`, `package`)
        VALUES ('$code', '$cinS','$nameS', '$villeS', '$adresseS','$emailS','$phoneS','$cinR','$nameR',
        '$emailR','$phoneR','$villeR','$quartier','$rue', '$codePostal', '$poids', '$sensible', now(), 
        '$Categorie', '$package')";
        $pdo2->exec($sql);
        echo "<script>alert(\"Bien Ajouter\")</script>";
  }
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
                <a href="index.php" >
                    <span class="material-icons-sharp">home</span>
                    <h3>Acceuil</h3>
                </a>
                <a href="ajouter.php" class="active">
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
    <form action="ajouter.php" method="post">
    <div class="insights">
        <div class="expéditeur">
            <span class="material-symbols-sharp">swipe_right_alt</span>
            <div class="middle">
                <div class="left">
                    <h3>Expéditeur</h3>
                </div>
                <div class="progress">
                </div>
                <div class="abreger">

                    <!--abréger-->
                </div>
            </div>
            <div class="info">
                <h5>CIN</h5><input type="text" name="cinS" required>
                <h5>Nom</h5><input type="text" name="fullNameS"required>
                <h5>Ville</h5><input type="text" name="villeS"required>
                <h5>Adresse</h5><input type="text" name="adresseS"required>
                <h5>Email</h5><input type="email" name="emailS">
                <h5>Téléphone</h5><input type="tel" name="phoneS"required>
            </div>
        </div>
        <!-------End of emetteur------->
        <div class="émetteur">
            <span class="material-symbols-sharp">linear_scale</span>
            <div class="middle">
                <div class="left">
                    <h3>Emétteur</h3>
                </div>
                <div class="progress">
                </div>
                <div class="abreger">
                    <!--abréger-->
                </div>
            </div>
            <div class="info">
                <h5>CIN</h5><input type="text" name="cinR"required>
                <h5>Nom</h5><input name="fullNameR"required>
                <h5>Email</h5><input name="emailR">
                <h5>Téléphone</h5><input name="phoneR"required>
            </div>
        </div>
        <!-------End of expeditteur------->
        <div class="coli">
            <span class="material-symbols-sharp">inventory_2</span>
            <div class="middle">
                <div class="left">
                    <h3>Coli</h3>
                </div>
                <div class="progress">
                </div>
                <div class="abreger">
                    <!--abréger-->
                </div>
            </div>
            <div class="info">
                <h5>Poids</h5><input type="number" name="poids"required>
                <h5>Sensible</h5>
                <select name="sensible" required>
                    <option value="false" selected="" disabled="">Selectionner</option>
                    <option value="false">Non</option>
                    <option value="true">Oui</option>
                </select>
                
                <h5>Ville</h5><input type="text" name="villeR"required>
                <h5>Code Postal</h5><input type="number" name="codePostal"required>
                <h5>Quartier</h5><input type="text" name="quartier"required>
                <h5>Rue</h5><input type="text" name="rue"required>
                <select name="package" id="package" required>
                    <option value="" disabled="" selected="">Selectionner packege</option>
                    <?php foreach ($types as $type){
                    echo "<option value='$type[id]' >$type[nom] : La $type[largeur], Lo $type[longueur], H $type[hauteur]</option>";
                    }
                ?>
                </select>
                <select name="categorie" id="categorie"required>
                        <option value=" " disabled="" selected="">Selectionner categorie</option>
                        <?php foreach ($categories as $categorie){
                echo "<option value='$categorie[id]' >$categorie[nom]</option>";}
                ?>
                </select>
                
            </div>
        </div>
        <!-------End of expeditteur------->

    </div>
    <div class="ajout">
        <!--<span class="material-icons-sharp">add_circle_outline</span>-->
        <button type="submit" name="ajouter">Ajouter</button>
    <!--End of insights-->
    </form>
</main>
<!-------Enf of main------->
</div>
</body>

</html>