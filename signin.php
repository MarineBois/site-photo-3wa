<?php include('php/header.php') ?>
		
</header>
        
        <main>

        <?php if (isset($_SESSION['idUser'])) : ?>

            <form class="form-signin" onsubmit="inscription();return false">
                <h1>Créer un nouvel auteur</h1>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email" name="email">
                    <label for="exampleInputEmail1" class="displayLabel">Email address</label>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Entrez votre prénom" name="prenom" id="prenom">
                    <label for="prenom" class="displayLabel">Prénom</label>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="displayLabel">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2" class="displayLabel">Password confirmation</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirmer votre password" name="password2">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Annuler</button>
            </form>

        <?php else : ?>
            <a href="connexion.phtml" class="btn btn-primary"> Se connecter </a>
        <?php endif ?>

        </main>
        <script src="js/inscription.js"></script>    
    </body>
</html>