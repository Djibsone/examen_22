function confirmation() {
   return confirm('Voullez-vous vraiment supprimer cette oeuvre ?')
}

    var categorieSelect = document.getElementById('categorie');
    var anneeField = document.getElementById('anneeField');
    var auteurField = document.getElementById('auteurField');

    categorieSelect.addEventListener('change', function() {
        var selectedCategorie = categorieSelect.value;

        if (selectedCategorie === '2') {
            anneeField.style.display = 'block';
            auteurField.style.display = 'block';
        } else {
            anneeField.style.display = 'none';
            auteurField.style.display = 'none';
        }
    });

   /* var categorieSelect = document.getElementById('categorie');
    var anneeField = document.getElementById('anneeField');
    var auteurField = document.getElementById('auteurField');

    // Faites une requête AJAX pour récupérer la liste des catégories
    // Supposons que l'API retourne un tableau JSON appelé "categories"

    fetch('../controllers/categories.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(categories) {
            // Créez dynamiquement les options du sélecteur de catégorie
            categories.forEach(function(categorie) {
                var option = document.createElement('option');
                option.value = categorie.idCategorie;
                option.textContent = categorie.nomCategorie;
                categorieSelect.appendChild(option);
            });
        })
        .catch(function(error) {
            console.error(error);
        });

    categorieSelect.addEventListener('change', function() {
        var selectedCategorie = categorieSelect.value;

        if (selectedCategorie === 'tresors_royaux') {
            anneeField.style.display = 'block';
            auteurField.style.display = 'block';
        } else {
            anneeField.style.display = 'none';
            auteurField.style.display = 'none';
        }
    });*/

$(document).on("click", ".goBack", function (e) {
    e.preventDefault();
    
    window.history.back();
});