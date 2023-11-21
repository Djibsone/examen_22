<?php
require_once('../models/connexion.php');

    $artistes = getAllArtistes();
    //  $stmt = $artistes->fetchAll(PDO::FETCH_ASSOC);
    //  var_dump($stmt);

    $categories = getAllCategories();
    //  $stmt = $categories->fetchAll(PDO::FETCH_ASSOC);
    //  var_dump($stmt);