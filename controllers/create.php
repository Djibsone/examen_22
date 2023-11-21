<?php
require_once('../models/connexion.php');

if (isset($_POST['soumettre'])) {
    if (!empty($_POST['nom']) && !empty($_POST['categorie'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $desc = htmlspecialchars($_POST['desc']);
        $annee = htmlspecialchars($_POST['annee']);
        $artiste = htmlspecialchars($_POST['artiste']);
        $categorie = htmlspecialchars($_POST['categorie']);

        $check = getOeuvre($nom);
        $result = $check->rowCount();
        
        if ($result) {
            $_SESSION['error'] = 'Cette oeuvre existe déjà !';
        } else {
            if ($annee && $artiste) {
                $stmt = addOeuvre($nom, $desc, $annee, $artiste, $categorie);    
                ($stmt) ? $_SESSION['success'] = 'Enregistrment effectué avec succès' : $_SESSION['error'] = 'Erreur d\'enregistrement';
            } else {
                $desc = null; $annee = null; $artiste = null;
                $stmt = addOeuvre($nom, $desc, $annee, $artiste, $categorie);    
                ($stmt) ? $_SESSION['success'] = 'Enregistrment effectué avec succès' : $_SESSION['error'] = 'Erreur d\'enregistrement';
            }
        }
        
    } else {
        $_SESSION['error'] = 'Les champ nom de l\'oeuvre et catégorie sont obligatores';
    }
    
    // Fermer l'écriture de la session
    session_write_close();
    header('Location: ../views/create.php');

}

//Ekélodjouotie  Trône d'aparanat du Roi GHEZO