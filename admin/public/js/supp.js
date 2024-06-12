document.addEventListener('DOMContentLoaded', (event) => {
    const deleteButtons = document.querySelectorAll('.delete_td_btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const clientId = this.getAttribute('data-id');
            if(confirm('Êtes-vous sûr de vouloir supprimer ce client ?')) {
                fetch(`delete_client.php?id=${clientId}`, {
                    method: 'GET'
                })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            alert('Client supprimé avec succès');
                            // Supprimez la ligne du tableau
                            const row = this.closest('tr');
                            row.parentNode.removeChild(row);
                        } else {
                            alert('Échec de la suppression du client');
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        alert('Erreur lors de la suppression du client');
                    });
            }
        });
    });
});
