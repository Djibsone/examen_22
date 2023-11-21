<?php
require_once('../models/connexion.php');

if (isset($_POST['modifier'])) {
    
    if (!empty($_POST['nom']) && !empty($_POST['categorie'])) {
        $id = htmlspecialchars($_POST['id']);
        $nom = htmlspecialchars($_POST['nom']);
        $desc = htmlspecialchars($_POST['desc']);
        $annee = htmlspecialchars($_POST['annee']);
        $artiste = htmlspecialchars($_POST['artiste']);
        $categorie = htmlspecialchars($_POST['categorie']);

        if ($annee && $artiste) {
            $stmt = updateOeuvre($nom, $desc, $annee, $artiste, $categorie, $id);    
            ($stmt) ? $_SESSION['success'] = 'Modification effectué avec succès' : $_SESSION['error'] = 'Erreur de modification';
        } else {
            $desc = null; $annee = null; $artiste = null;
            $stmt = updateOeuvre($nom, $desc, $annee, $artiste, $categorie, $id);    
            ($stmt) ? $_SESSION['success'] = 'Modification effectué avec succès' : $_SESSION['error'] = 'Erreur de modification';
        }   
    } else {
        $_SESSION['error'] = 'Les champs à modifier sont obligatores';
        //header('Location: ../views/modifie.php');
    }
    header('Location: ../views/modifie.php');
}