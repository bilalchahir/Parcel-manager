<?php
    $u = 'root';
    $p = '';
    $dbs = 'mysql:host = localhost; dbname = COLI';
    
    try{
        $pdo = new PDO($dbs, $u, $p);
    } catch(PDOException $e){
        print "Error : " . $e->getMessage() . "</br>";
        die();
    }

?>