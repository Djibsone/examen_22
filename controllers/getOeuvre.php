<?php
require_once('../models/connexion.php');

if (isset($_GET['id'])) {
    if (!empty($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);

        $check = getOeuvre($id);
        //$result = $check->fetchAll();
        foreach($check as $oeuvre);
       
    } else {
        $_SESSION['error'] = 'Indiquez le code de l\'oeuvre svp';
    } 
}