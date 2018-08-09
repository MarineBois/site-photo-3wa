<?php include('php/header.php') ?>
		
</header>
        
        <main>
            <?php if (empty($_SESSION['idUser'])) : ?>
            <form class="form-signin" onsubmit="connexion();return false">
                <h1>Espace de connexion Admin</h1>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <label for="exampleInputEmail1" class="displayLabel">Email address</label>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="displayLabel">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php endif ?>
            <?php if (!empty($_SESSION['idUser'])) : ?>
                <a href="admin.php" class="btn btn-primary"> Espace Auteur </a>
            <?php endif ?>
            <script src="js/connexion.js"></script>
        </main>
    </body>
</html>