<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $clientDB = new ClientDB($cnx);
    $client = $clientDB->getClientById(intval($_GET['id']));
} else {
    exit('Aucun bon identifiant de client');
}
?>

<h2>Modification des clients</h2>
<div class="container">
    <form id="form_modification" method="get">
        <input type="hidden" name="id_client">
        <div class="mb-3">
            <label for="nom_client" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom_client" name="nom_client" value="<?= $client[0]->nom_client ?? ''; ?>">
        </div>
        <div class="mb-3">
            <label for="prenom_client" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom_client" name="prenom_client"  value="<?= $client[0]->prenom_client ?? ''; ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email"  value="<?= $client[0]->email ?? ''; ?>">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse"  value="<?= $client[0]->adresse ?? ''; ?>">
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Numéro</label>
            <input type="text" class="form-control" id="numero" name="numero"  value="<?= $client[0]->numero ?? ''; ?>">
        </div>
        <input type="hidden" name="id_client" value="<?= $client[0]->id_client;?>" id="id_client">
        <button type="submit" id="texte_bouton_modif" class="btn btn-primary">
            Modifier
        </button>
        <button class="btn btn-primary" type="reset" id="reset">Annuler</button>
    </form>
</div>