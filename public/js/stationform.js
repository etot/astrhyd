$( "#Station_code" ).autocomplete({
    source: function( request, response ) {
     // Fetch data
     $.ajax({
      url: 'https://api.sandre.eaufrance.fr/recherche/v1/stq/' + $( "#Station_code" ).val(),
      type: 'get',
      success: function(data) {
        response($.map( data, function( item ) {
            return {
                label: item.label,
                value: item.ss_item_code
            }
        }));
     }
     });
    },
    /*select: function (event, ui) {
     // Set selection
     $('#autocomplete').val(ui.item.label); // display the selected text
     $('#selectuser_id').val(ui.item.value); // save selected id to input
     return false;
    }*/
});

/*
var timeout = null;

$("#Station_code").keyup(function(){
    if (timeout !== null) {
        clearTimeout(timeout);
    }
    url = 'https://api.sandre.eaufrance.fr/recherche/v1/stq/' + this.value;
    timeout = setTimeout(function () {
        $.ajax({
            type: 'GET',
            url: url,
        })
        .done(function( msg ) {
            $('#Station_code').empty();
            $.each(msg, function(key,value) {
                $('#Station_code').append($("<option></option>")
                    .attr("value", value.ss_item_code).text(value.label));
                });
        }); 
    }, 500);
});
*/



