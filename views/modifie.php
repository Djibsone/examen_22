<?php include '../controllers/getOeuvre.php' ?>
<?php include '../controllers/artiste_catgorie.php' ?>

<!-- header start -->
<?php include './header.php' ?>
<!-- header end -->

  <div class="containe">

    <div class="content">

        <div class="card">
            <!-- <h2>Réchercher un oeuvre en fonction de son code</h2> -->
            <div class="form-group">
                <?php include './msg_error_success.php' ?> 
            </div>
           
            <h2>MODIFIER DES OEUVRES</h2>
            <a href="../">
                <button type="" class="goBack">
                    Rétour
                </button>
            </a>
            <form action="../controllers/modifie.php" method="post" class="mt-5">
                <input type="text" name="id" value="<?= $oeuvre['idOeuvre'] ?>" hidden>
                <div class="form-group mt-5">
                    <label for="code">Nom de l'oeuvre</label>
                    <input type="text" name="nom" value="<?= $oeuvre['nom'] ?>">
                </div>

                <div class="form-group">
                    <label for="nomprojet">Description</label>
                    <input type="text" name="desc" value="<?= $oeuvre['description'] ?>">
                </div>
                
                <div class="form-group">
                <label for="">Catégorie</label>
                <select name="categorie" id="categorie">
                    <option value="<?= ($oeuvre['idCategorie']) ? $oeuvre['idCategorie']  : null ?>"><?= ($oeuvre['nomCategorie']) ? $oeuvre['nomCategorie']  : 'Selectionnez une catégorie' ?></option>
                    <?php foreach($categories as $categorie): ?>
                        <option value="<?= $categorie['idCategorie'] ?>"><?= $categorie['nomCategorie'] ?></option>
                    <?php endforeach; ?> 
                </select>
                </div>

                <div class="form-group" id="anneeField" style="display: none;">
                <label for="annee">L'année</label>
                <input type="text" name="annee" class="anneeField" value="<?= $oeuvre['annee'] ?>">
                </div>

                <div class="form-group" id="auteurField" style="display: none;">
                <label for="">Artiste</label>
                <select name="artiste" class="auteurField">
                    <option value="<?= ($oeuvre['idArtiste']) ? $oeuvre['idArtiste']  : null ?>"><?= ($oeuvre['nomArt']) ? $oeuvre['prenom'] . ' ' . $oeuvre['nomArt']  : 'Selectionnez un artiste' ?></option>
                    <?php foreach($artistes as $artiste): ?>
                        <option value="<?= $artiste['idArtiste'] ?>"><?= $artiste['prenom'] ?> <?= $artiste['nomArt'] ?></option>
                    <?php endforeach; ?> 
                </select>
                </div>
            
                <div class="form-group">
                    <button type="submit" name="modifier">Modifier</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
        </div>
  </div>

<!-- footer start -->
<?php include './footer.php' ?>
<!-- footer end -->