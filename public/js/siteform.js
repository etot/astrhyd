$('#Site_departement').change(function(){
    $.ajax({
        method: "GET",
        url: "https://geo.api.gouv.fr/departements/" + this.value + "/communes",
      })
        .done(function( msg ) {
            $('#Site_commune').empty();
            $.each(msg, function(key,value) {
                $('#Site_commune').append($("<option></option>")
                   .attr("value", value.nom).text(value.nom));
              });
        }); 
  });

$('#Site_code_reseau').select2({
  tags: true
});