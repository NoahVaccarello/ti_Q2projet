<?php
$cat = new AccesoireDB($cnx);
$liste = $cat->getAllAccesoire();
$nbr_cat = count($liste);
?>

<main>
    <section id="serie">
        <section id="cart">
            <h2>Panier</h2>
            <ul id="shop-items"></ul>
            <p>Total: $<span id="cart-total">0.00</span></p>
        </section>

        <div class="shop-grid">
            <?php for ($i = 0; $i < $nbr_cat; $i++) { ?>
                <div class="shop-item" data-name=<?php print $liste[$i]->nom_accesoire; ?> data-price=<?php print $liste[$i]->prix; ?>>
                    <img src="./admin/image/<?php print $liste[$i]->image_accesoire; ?>">
                    <strong>BMW</strong>
                    <p><?php print $liste[$i]->nom_accesoire; ?></p>
                    <p><?php print $liste[$i]->prix; ?>€</p>
                    <button class="add-to-cart">Ajouter au panier</button>
                </div>

            <?php } ?>
        </div>

</main>

<script src="./admin/public/js/boutique.js"></script>
</main>
