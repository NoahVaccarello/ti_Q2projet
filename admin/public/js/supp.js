function ajaxDeleteClient(clientId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce client ?')) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: './src/php/ajax/delete_client.php',
            data: { id: clientId },
            success: function (data) {
                if (data.success) {
                    alert('Client supprimé avec succès');
                    // Supprimez la ligne du tableau
                    $(`button[data-id='${clientId}']`).closest('tr').remove();
                } else {
                    alert('Échec de la suppression du client');
                }
            },
            error: function (error) {
                console.error('Erreur:', error);
                alert('Erreur lors de la suppression du client');
            }
        });
    }
}

