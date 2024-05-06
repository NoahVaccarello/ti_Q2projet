<?php
$cat = new BoutiqueDB($cnx);
$liste = $cat->getAllBoutique();
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
            <div class="shop-item" data-name="Polo" data-price="45€">
                <img src="./admin/image/<?php print $liste[$i]->image_vet; ?>">
                <strong>BMW</strong>
                <p><?php print $liste[$i]->nom_vet; ?></p>
                <p><?php print $liste[$i]->prix; ?>€</p>
                <button class="add-to-cart">Ajouter au panier</button>
            </div>

            <?php } ?>
        </div>

</main>

<script src="./admin/public/js/boutique.js"></script>
</main>
