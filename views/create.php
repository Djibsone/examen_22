<?php include '../controllers/artiste_catgorie.php' ?>
<?php include './header.php' ?>
<br><br>
<div class="card">
  <h2>CREER DES OEUVRES</h2>
  <a href="../">
      <button type="" class="goBack">
          Rétour
      </button>
  </a>
  <div class="form-group">
    <?php include './msg_error_success.php' ?>
  </div>
  <form action="../controllers/create.php" method="post">
    <div class="form-group">
      <label for="code">Nom de l'oeuvre</label>
      <input type="text" name="nom" placeholder="XXXXXX">
    </div>
    
    <div class="form-group">
      <label for="nomprojet">Description</label>
      <input type="text" name="desc" placeholder="XXXXXX">
    </div>
    
    <div class="form-group">
      <label for="">Catégorie</label>
      <select name="categorie" id="categorie">
        <option>Selectionnez une catégorie</option>
        <?php foreach($categories as $categorie): ?>
          <option value="<?= $categorie['idCategorie'] ?>"><?= $categorie['nomCategorie'] ?></option>
        <?php endforeach; ?> 
      </select>
    </div>

    <div class="form-group" id="anneeField" style="display: none;">
      <label for="annee">L'année</label>
      <input type="text" name="annee" class="anneeField" placeholder="XXXXXX">
    </div>

    <div class="form-group" id="auteurField" style="display: none;">
      <label for="">Artiste</label>
      <select name="artiste" class="auteurField">
        <option>Selectionnez un artiste</option>
        <?php foreach($artistes as $artiste): ?>
          <option value="<?= $artiste['idArtiste'] ?>"><?= $artiste['prenom'] ?> <?= $artiste['nomArt'] ?></option>
        <?php endforeach; ?> 
      </select>
    </div>
    
    <div class="form-group">
      <button type="submit" name="soumettre">Soumettre</button>
      <button type="reset">Annuler</button>
  </div>
  </form>

</div>

<?php include './footer.php' ?>