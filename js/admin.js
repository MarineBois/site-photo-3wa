$('#customFile').change(function () {
    $(".custom-file-label").text($('#customFile').get(0).files[0].name);
});

function addCategorie() {
    $('.alert-danger').remove();
    var libelle = $('#libelle').val();

    if (libelle.trim().length > 0 ) {
        $.ajax({
            url:'php/categorie.php',
            method:'POST',
            data:{libelle:libelle},
            dataType:'json',
            success: function(data){
                if (data.result == true) {
                    $('<div class="alert alert-success" role="alert">'+data.message+'</div>').insertAfter("h2#categorie");
                } else {
                    $('<div class="alert alert-danger" role="alert">'+data.message+'</div>').insertAfter("h2#categorie");
                }
            },
        });
    }else {
        $('<div class="alert alert-danger" role="alert">Merci d\'entrer une valeur</div>').insertAfter("h2#categorie");
    }
}

function addPhoto() {
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
                    $('.alert-success').html(data.message);
                } else {
                    $('.alert-danger').show();
                    $('.alert-danger').html(data.message);
                }
            }
        });
    }    
}