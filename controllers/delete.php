<?php
require_once('../models/connexion.php');

if(isset($_GET['id'])){

    if (!empty($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);

        $stmt = delOeuvre($id);
        if ($stmt) {
            $_SESSION['success'] = 'Suppression effectuée avec succès';
        } else {
            $_SESSION['error'] = 'Erreur de suppression';
        }  
    }
    else{
        $_SESSION['error'] = 'Indiquez le code de l\'oeuvre svp';
    }
    header('location: ../');
}