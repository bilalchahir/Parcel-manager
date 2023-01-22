<?php 
  $title = "Nouveau-Colis";
  require_once '../includes/header.php';
  $pdo2 = $pdo;
  if(isset($_POST['confirmer'])){
    $password = $_POST['password'] ;
    $passwordC =  $_POST['passwordC'];
    if($password == $passwordC){
        $pdo->exec("UPDATE colis.user SET password = $password WHERE id in(1,2)");
        echo "<script>alert(\"Password Changed successfully\")</script>";
    }
    else{
        echo "<script>alert(\"Unmatched Passwords\")</script>";
    }
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
        <a href="index.php">
            <span class="material-icons-sharp">home</span>
            <h3>Acceuil</h3>
        </a>
        <a href="ajouter.php" >
            <span class="material-icons-sharp">add_circle_outline</span>
            <h3>Ajouter Coli</h3>
        </a>
        <a href="parametre.php" class="active">
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
    <h2>Paramètre admin</h2>
    <div class="insights">
        <div class="émetteur">
            <span class="material-symbols-sharp">settings</span>
            <div class="middle">
                <div class="left">
                    <h3>Modifier le mot de passe</h3>
                    <form action="parametre.php" method="POST">
                        <h4>Mot de passe</h4><input type="password" name="password">
                        <h4>Confirmé</h4><input type="password" name="passwordC">
                        <div>
                            <button type="submit" name="confirmer">Confirmer</button>
                        </div>
                </div>
                <div class="progress">
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</body>

</html>