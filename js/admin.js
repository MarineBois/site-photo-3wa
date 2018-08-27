$('#customFile').change(function () {
    $(".custom-file-label").text($('#customFile').get(0).files[0].name);
});

function RefreshPage(){
    location.reload();
}

function addCategorie() {
    $('.alert-danger').remove();
    $('.alert-success').remove();
    var libelle = $('#libelle').val();

    if (libelle.trim().length > 0 ) {
        $.ajax({
            url:'php/categorie.php',
            method:'POST',
            data:{libelle:libelle},
            dataType:'json',
            success: function(data){
                if (data.result == true) {
                    $('.alert-success').show();
                    $('<div class="alert alert-success" role="alert"><p>'+data.message+'</p><small>La liste se rafraichira dans 5 secondes</small></div>').insertAfter("h2#categorie");
                    setTimeout(RefreshPage, 5000);
                } else {
                    $('.alert-danger').show();
                    $('<div class="alert alert-danger" role="alert"><p>'+data.message+'</p></div>').insertAfter("h2#categorie");
                }
            },
        });
    }else {
        $('.alert-danger').show();
        $('<div class="alert alert-danger" role="alert">Merci d\'entrer une valeur</div>').insertAfter("h2#categorie");
    }
}

function addPhoto() {
    $('.alert-danger').hide();
    $('.alert-success').hide();
    var nom = $('#nom').val();
    var description = $('#description').val();
    var categorie = $('#categorie').val();

    if (nom.trim().length > 0 && description.trim().length > 0 && categorie.trim().length > 0 ) {
        //déclaration de l'objet formData pour envoi de fichier
        var form = $('form').get(0);
        var formData = new FormData(form);
        $.ajax({
            url: "php/upload.php",
            type: "POST",
            data: formData,
            processData: false,  // dire à jQuery de ne pas traiter les données
            contentType: false,   // dire à jQuery de ne pas définir le contentType
            dataType: 'json',
            success : function (data) {
                if (data.result == true) {
                    $('.alert-success').show();
                    $('.alert-success').html('<p>'+data.message+'</p><small>La liste se rafraichira dans 5 secondes</small>');
                    setTimeout(RefreshPage, 5000);
                } else {
                    $('.alert-danger').show();
                    $('.alert-danger').html(data.message);
                }
            }
        });
    }    
}