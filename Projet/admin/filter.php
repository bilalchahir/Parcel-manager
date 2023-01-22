<?php
  include('../db/pdo.php');
    if(isset($_POST['key'])  || isset($_POST['package']) || isset($_POST['categorie'])){
        $sql = $pdo->query("SELECT count(*) as total from colis.coli");
        $count = $sql->fetch();
        $c = $count['total'];

        $key = $_POST['key'];
        $package = $_POST['package'];
        $categorie = $_POST['categorie'];

        $sql = $pdo->query("SELECT * FROM COLIs.coli c, colis.categorie ca, colis.package p where (c.code like '%{$key}%'
         or c.fullNameSender like '%{$key}%' or c.fullNameReceiver like '%{$key}%' or c.phoneSender like '%{$key}%'
         or c.phoneReceiver like '%{$key}%' or c.emailSender like '%{$key}%' or c.emailReceiver like '%{$key}%' 
         or c.villeSender like '%{$key}%' or c.adresseSender like '%{$key}%' or c.villeReceiver like '%{$key}%'
         or c.rue like '%{$key}%' or c.quartier like '%{$key}%' or c.poids like '%{$key}%' )
          and (c.categorie = ca.id and c.package = p.id
         and c.categorie like '$categorie' and c.package like '$package') LIMIT $c");
        $colis = $sql->fetchAll();
    }
    else{
        $sql = $pdo->query("SELECT * FROM COLIS.coli");
        $colis = $sql->fetchAll();
    }


?>
<?php if($colis){ ?>
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
            <td><?php if($coli['recu']==false)echo("Pas encore");else echo($coli['dateReceive']);?></td>
            <td><a href="../consulter.php?code=<?php echo($coli[1])?>">Details</a> <a href="index.php?code=<?php echo($coli[1])?>">Reçu</a></td>
        </tr>
    <?php } ?>
</table>
<?php } else echo"<h2>Pas de colis</h2>"; ?>
