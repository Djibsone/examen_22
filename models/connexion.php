<?php
session_start();
//Connexion à la base de données
function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=tresor;charset=utf8', 'djibril', 'tamou');
        return $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

//Récupérer tous les candidats
function getAllOeuvres(){
    $db = dbConnect();

    $req = $db->query('SELECT o.idOeuvre, o.nom, a.nomArt, a.prenom, o.annee, c.nomCategorie FROM oeuvre o LEFT JOIN artiste a ON o.idArtiste = a.idArtiste LEFT JOIN categorie c ON o.idCategorie = c.idCategorie ORDER BY o.idOeuvre');
    return $req;
}


//Récupérer un candidat
function getOeuvre($id){
    $db = dbConnect();

    $req = $db->prepare('SELECT o.idOeuvre, o.nom, a.nomArt, a.prenom, o.annee, c.nomCategorie 
    FROM oeuvre o LEFT JOIN artiste a ON o.idArtiste = a.idArtiste LEFT JOIN categorie c ON o.idCategorie = c.idCategorie 
    WHERE idOeuvre = ?');
    //$req = $db->prepare('SELECT o.idOeuvre, o.idCategorie, o.idArtiste, o.nom, a.nomArt, a.prenom, o.annee, c.nomCategorie FROM oeuvre o LEFT JOIN artiste a ON o.idArtiste = a.idArtiste LEFT JOIN categorie c ON o.idCategorie = c.idCategorie WHERE idOeuvre = ?');
    $req->execute(array($id));
    return $req;
}

//Ajouter un candidat
function addOeuvre($nom, $desc, $annee, $artiste, $categorie){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO oeuvre(nom,description,annee,idArtiste,idCategorie) VALUES(?,?,?,?,?)');
    if($req->execute(array($nom, $desc, $annee, $artiste, $categorie)))
        return true;
    else
        return false;
}

//rechercher les projets
// function rechercheProjets($code) {
//     $db = dbConnect();
//     $req = $db->prepare('SELECT codprojet,nomprojet,datelance,duree,l.codlocal,nomlocal FROM projet p LEFT JOIN localite l ON p.codlocal=l.codlocal WHERE codprojet LIKE :code');
//     $req->execute(array(':code' => '%' . $code . '%'));
//     return $req;
// }

//Compter le nombre de candidat
function countOeuvres() {
    $db = dbConnect();
    $stmt = $db->query('SELECT COUNT(*) AS total_oeuvres FROM oeuvre');
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_oeuvres'];
}

//Recuperer categorie d'oeuvre
function getAllCategories(){
    $db = dbConnect();
    $req = $db->query('SELECT * FROM categorie ORDER BY idCategorie DESC');
    return $req;
}

//Recuperer artiste d'oeuvre
function getAllArtistes(){
    $db = dbConnect();
    $req = $db->query('SELECT * FROM artiste ORDER BY idArtiste DESC');
    return $req;
}

//Modifier un info oeuvre
function updateOeuvre($nom, $desc, $annee, $artiste, $categorie, $id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE oeuvre SET nom = ?, description = ?, annee = ?, idArtiste = ?, idCategorie = ? WHERE idOeuvre = ?');

    if($req->execute(array($nom, $desc, $annee, $artiste, $categorie, $id)))
        return true;
    else
        return false;
}

//Supprimer l'nfos oeuvre
function delOeuvre($id){
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM oeuvre WHERE idOeuvre = ?');

    if($req->execute(array($id)))
        return true;
    else
        return false;
}

