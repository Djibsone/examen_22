<?php
require_once('./models/connexion.php');

    $oeuvres = getAllOeuvres();
    //  $stmt = $oeuvres->fetchAll(PDO::FETCH_ASSOC);
    //  var_dump($stmt);
    
    //compter le numbre d'oeuvre par auteur
    $total_oeuvres = countOeuvres();

    //Select localite
    //$localites = getLocalite();