<?php
$cat = new CategorieDB($cnx);
$liste = $cat->getAllCategories();
$nbr_cat = count($liste);

?>

<main>
    <section id="serie">
        <div id="cart">
            <h2>Notre catalogue !</h2>
        </div>
        <div class="car-grid">
            <?php for ($i = 0; $i < $nbr_cat; $i++) { ?>

                <div class="car-item" data-name="<?php print $liste[$i]->serie_produit; ?>" data-price="<?php print $liste[$i]->prix; ?>" >
                    <img src="./admin/image/<?php print $liste[$i]->image_produit; ?>">
                    <strong><?php print $liste[$i]->nom_produit; ?></strong>
                    <p><?php print $liste[$i]->serie_produit; ?></p>
                    <p>À partir de <?php print $liste[$i]->prix; ?>€</p>
                    <button class="add-to-cart" onclick="afficherDescription(<?php echo $i; ?>)">Afficher la fiche technique</button>
                    <div class="descss" id="description<?php echo $i; ?>" style="display: none;">
                        <?php echo $liste[$i]->detail; ?>
                    </div>

                </div>

            <?php } ?>
        </div>
    </section>
    <footer>
        <p>&copy; 2023 BMW Cars</p>
    </footer>
    <script src="./admin/public/js/app.js"></script>
</main>
