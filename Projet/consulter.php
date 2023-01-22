<?php

include('db/pdo.php');
$code = $_GET['code'];
$sql = $pdo->query("SELECT * FROM COLIs.coli c, colis.categorie ca, colis.package p where c.code = '$code' 
         and c.categorie = ca.id and c.package = p.id");
$coli = $sql->fetch();

    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <title>Sort here</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    </head>
    <body>
        <div class="container">
            <main>
                <?php if( $coli ){  ?>
                <div class="insights">
                    <!-------End of emetteur------->
                    <div class="expéditeur">
                    <span class="material-symbols-sharp">swipe_right_alt</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Expéditeur</h3>
                                <h4>CIN</h4><output name="cin" ><?php echo ($coli['cinSender']); ?></output>
                            </div>
                            <div class="progress">
                            </div>
                            <div class="abreger">
                                <p><p><?php echo ($coli['villeSender']); ?></p>  <!--abréger-->
                            </div>
                        </div>
                        <div class="info">
                            <h5>Nom:<output name="nom"><?php echo ($coli['fullNameSender']); ?></output></h5>
                            <h5>Adresse:<output name="Adresse"><?php echo ($coli['adresseSender']); ?></output></h5>
                            <h5>Email:<output name="email"></output><?php echo ($coli['emailSender']); ?></h5>
                            <h5>Téléphone:<output name="Téléphone"><?php echo ($coli['phoneSender']); ?></output></h5>
                        </div>
                    </div>
                    <!-------End of expeditteur------->
                    <div class="émetteur">
                        <span class="material-symbols-sharp">linear_scale</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Émetteur</h3>
                                <h4>CIN</h4><output name="cin"><?php echo ($coli['cinReceiver']); ?></output>
                            </div>
                            <div class="progress">
                            </div>
                            <div class="abreger">
                                <p><?php echo ($coli['villeReceiver']); ?></p>  <!--abréger-->
                            </div>
                        </div>
                        <div class="info">
                            <h5>Nom:<output name="nom"><?php echo ($coli['fullNameReceiver']); ?></output></h5>
                            <h5>Adresse:<output name="Adresse"><?php echo ($coli['rue']. " ". $coli['quartier']. " " .$coli['villeReceiver']); ?></output></h5>
                            <h5>Email:<output name="email"><?php echo ($coli['emailReceiver']); ?></output></h5>
                            <h5>Téléphone:<output name="Téléphone"><?php echo ($coli['phoneReceiver']); ?></output></h5>
                        </div>
                    </div>
                    <div class="coli">
                        <span class="material-symbols-sharp">inventory_2</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Coli</h3>
                                <h4>Code</h4><?php echo ($coli['code']); ?><output name="number"></output>
                            </div>
                            <div class="progress">
                            </div>
                            <div class="abreger">
                                <p><?php echo ($coli['code']); ?></p>  <!--abréger-->
                            </div>
                        </div>
                        <div class="info">
                            <h5>Date d'envoi:<output name="poids"><?php echo ($coli['dateSend']); ?></output></h5>
                            <h5>Poids:<output name="poids"><?php echo ($coli['poids']); ?></output></h5>
                            <h5>Sensible:<output name="poids"><?php if($coli['sensible'])echo"Oui";else echo"Non"; ?></output></h5>
                            <h5>Package:<output name="package"><?php echo ($coli[26]); ?></output></h5>
                            <h5>Catégorie:<output name="poids"><?php echo ($coli[24]); ?></output></h5>
                            <h5>Reçu:<output name="poids"><?php if($coli['recu'])echo"Oui";else echo"Non"; ?></output></h5>
                            <h5>Date de reçu:<output name="poids"><?php if($coli['recu'])echo($coli['dateReceive']);else echo"-"; ?></output></h5>
                        </div>
                    </div>
                    <!-------End of expeditteur------->
                </div>
                <?php } else echo" <H1>Aucun colis avec ce code</h1>" ?>
            </main>
        </div>
    </body>