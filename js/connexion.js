function connexion() {
    $('.alert-danger').remove();
    var email = $('input[type=email').val();
    var mdp = $('input[type=password]').val();
    var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;

    if (email.trim().length > 0 && mdp.trim().length > 0) {
        if (! regEmail.test(String(email).toLowerCase())){
            $('<div class="alert alert-danger" role="alert">Mauvais email</div>').insertAfter("h1");
        } else {
            $.ajax({
                url:'php/submit.php',
                method:'POST',
                data:{email:email,mdp:mdp},
                dataType:'json',
                success: function(data){
                    if (data.result == true) {
                        $(".form-signin").html(
                            '<div class="alert alert-success" role="alert">'+data.message+'</div><a href="admin.php" class="btn btn-primary"> Espace Auteur </a>'
                        );
                    } else {
                        $('<div class="alert alert-danger" role="alert">'+data.message+'</div>').insertAfter("h1");
                    }
                },
            });
        }
    }
}