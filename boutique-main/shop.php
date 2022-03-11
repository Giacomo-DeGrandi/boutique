<?php $title = "shop" ?>
<?php session_start();?>
<?php require_once('Model/Article.php'); ?>

<?php /* require_once('Model/CurrentProduct.php'); ?> */?>
<?php require_once('Model/Produit.php'); ?>
<?php require_once('Model/Contient.php'); ?>
<?php require_once('Model/User.php'); ?>
<?php require_once('Model/Search.php'); ?>
<?php require_once('Model/Categorie.php'); ?>
<?php require_once('Model/SousCategorie.php'); ?>
<?php require_once('Controller/shop_controller.php'); ?>
<?php require_once('Controller/user_controller.php'); ?>
<?php

// creation de mes produits
$souscategorie = new SousCategorie();
$detail = new Article();

?>

<?php ob_start() ?>
<main>
    <div class= "content">

        <!-- NavBar -->
        <div class="card shadow-sm col-sm-3 navCat">
            <h3>Catégories</h3>
            <?php
                // Generation d'une variable contenant le tableau avec chacune des sous categories
                $SCat = $souscategorie->getAllSubCat(); ?>

                <!-- Creation de la liste global qui sert de support à la navBar -->
                <ul name="tonton">

            <!-- Generation de la navBar -->
            <?php    for($i=0; $i<count($SCat); $i++) : ?>

            <!-- Evaluation de la condition pour fermer les sousmenu de souscategorie -->
            <?php       if ($i != 0 && $SCat[$i]["nom_categorie"] != $SCat[$i-1]["nom_categorie"]) :?>
                </ul>
            <?php       endif; ?>

            <!-- Evaluation de la condition pour la creation de chacun des niveau de la navBar -->
            <?php       if ( $i == 0 || ($SCat[$i]["nom_categorie"] != $SCat[$i-1]["nom_categorie"])) :?>
                    <li><a href="shop.php?id_categorie=<?= $SCat[$i]["id_categorie"] ?>" class="alert-link"><?= $SCat[$i]["nom_categorie"] ?></a></li>
                        <ul name="<?= $SCat[$i]["nom_categorie"] ?>">
                            <li><a href="shop.php?id_sous_categorie=<?= $SCat[$i]["id_sous_categorie"] ?>" ><?= $SCat[$i]["nom_sous_categorie"] ?></a></li>
            <?php       else : ?>
                            <li><a href="shop.php?id_sous_categorie=<?= $SCat[$i]["id_sous_categorie"] ?>" ><?= $SCat[$i]["nom_sous_categorie"] ?></a></li>
            <?php       endif; ?>

            <?php endfor; ?>
                </ul>
        </div>        

        <?= $souscontenu ?>

    </div>
</main>
<?php  $content=ob_get_clean(); ?>


<?php require ('View/patron.php'); ?>