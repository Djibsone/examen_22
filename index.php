<?php include './controllers/affiche.php' ?>

<!-- header start -->
<?php include './views/header.php' ?>
<!-- header end -->

<div class="container-fluid"> <!-- Utilisation de la classe container-fluid -->
    <div class="content">
        <div class="container-fluid">
            <div class="form-group" style="margin-top: 10px;">
                <div class="panel-body">
                    <a href="./views/create.php">
                        <button type="" class="goBack">
                            Créer
                        </button>
                    </a>
                    <h2>LISTE DES OEUVRES (<span style="color: red"><?= ($total_oeuvres) ? $total_oeuvres : 0 ?></span>)</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-full-width w-100"> <!-- Utilisation des classes table-full-width et w-100 -->
                            <thead class="">
                                <tr>
                                    <th>Oeuvre</th>
                                    <th>Auteur</th>
                                    <th>Année</th>
                                    <th>Catégorie</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($oeuvres as $oeuvre): ?>
                                    <tr>
                                        <td><?= $oeuvre['nom'] ?></td>
                                        <td><?= $oeuvre['prenom'] ?> <br> <?= $oeuvre['nomArt'] ?></td>
                                        <td><?= $oeuvre['annee'] ?></td>
                                        <td><?= $oeuvre['nomCategorie'] ?></td>
                                        <td><a href="./views/modifie.php?id=<?= $oeuvre['idOeuvre'] ?>" class="edit_btn" title="Modifier">Modifier</a>
                                        <a href="./controllers/delete.php?id=<?= $oeuvre['idOeuvre'] ?>" class="del_btn" title="Supprimer" onclick="return confirmation();">Supprimer</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer start -->
<?php include './views/footer.php' ?>
<!-- footer end -->