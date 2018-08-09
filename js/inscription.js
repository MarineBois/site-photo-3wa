function inscription() {
    $('.alert-danger').remove();
    var email = $('#exampleInputEmail1').val();
    var prenom = $('#prenom').val();
    var mdp = $('#exampleInputPassword1').val();
    var mdp2 = $('#exampleInputPassword2').val();
    var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;

    if (email.trim().length > 0 && mdp.trim().length > 0) {
        if (! regEmail.test(String(email).toLowerCase())){
            $('<div class="alert alert-danger" role="alert">Mauvais email</div>').insertAfter("h1");
        } else if (mdp != mdp2) {
            $('<div class="alert alert-danger" role="alert">La confirmation du mot de passe ne correspond pas au premier mot de passe </div>').insertAfter("h1");
        } else {
            $.ajax({
                url:'php/inscription.php',
                method:'POST',
                data:{email:email,prenom:prenom,mdp:mdp,mdp2:mdp2},
                dataType:'json',
                success: function(data){
                    if (data.result == true) {
                        console.log(data);
                        $(".form-signin").html(
                            '<div class="alert alert-success" role="alert">'+data.message_user+'</div><a href="admin.php" class="btn btn-primary"> Espace Auteur </a>'
                        );
                    } else {
                        console.log(data);
                        $('<div class="alert alert-danger" role="alert">'+data.message_user+'</div>').insertAfter("h1");
                    }
                },
            });
        }
    }
}