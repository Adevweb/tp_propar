
$('#adresse').autocomplete({
  source: function(requete, reponse) { // les deux arguments représentent les données nécessaires au plugin
    $.ajax({
      url: 'https://api-adresse.data.gouv.fr/search/', // on appelle le script JSON
      dataType: 'json', // on spécifie bien que le type de données est en JSON
      data: {
        q: $('#adresse').val(), // on donne la chaîne de caractère tapée dans le champ de recherche
        limit: 5
      },
      success: function(data) {
        reponse($.map(data.features, function(item) {
          return {
            label: item.properties.label // on retourne cette forme de suggestion
          };
        }));
      }
    });
  }
});
