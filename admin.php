<?php include('php/header.php') ?>
<?php include('php/utilities.php')?>
<?php include('php/affichage.php')?>
		
</header>

<main class="main_index">

    <?php if (isset($_SESSION['idUser'])) : ?>

        <h1>Bienvenue <?= htmlspecialchars($_SESSION['prenomUser']); ?> </h1>
        <a href="php/deconnexion.php" class="smallbtn">Déconnexion</a>

        <form class="container" onsubmit="addPhoto();return false;">
            <h2 id="photo">Ajouter une nouvelle photographie</h2>
            <div class="alert alert-danger displayNone" role="alert"></div>
            <div class="alert alert-success displayNone" role="alert"></div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nom" class="displayLabel">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom de la photo" name="nom">
                </div>
                <div class="form-group col-md-12">
                    <label for="description" class="displayLabel">Courte description</label>
                    <input type="text" class="form-control" id="description" placeholder="Courte description de la photo" name="description">
                </div>
                <div class="form-group col-md-6 align">
                    <label for="recherche" >Sélectionner une catégorie</label>
                    <select name="categorie" id="categorie">
                        <?php foreach($categories as $value) : ?>
                        <option value="<?php echo htmlspecialchars($value['id']) ?>"><?php echo htmlspecialchars($value['libelle']) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="custom-file col-md-6">
                    <input type="file" class="custom-file-input" id="customFile" required name="file">
                    <label class="custom-file-label" for="validatedCustomFile">Choisir une photo</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
            </div>    
            <div class="form-row">
                <div class="custom-file col-md-12">
                    <button type="submit" class="btn btn-primary col-md-12">Enregistrer</button>
                </div>
            </div>  	
        </form>
        
        <form class="container" onsubmit="addCategorie();return false;" id="categorie">
            <h2 id="categorie">Ajouter une nouvelle catégorie</h2>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="libelle" class="displayLabel">Libellé de la catégorie</label>
                    <input type="text" class="form-control" id="libelle" placeholder="Nouvelle catégorie" name="libelle">
                </div>
                <div class="custom-file col-md-12">
                    <button type="submit" class="btn btn-primary col-md-12">Enregistrer</button>
                </div>
            </div>    
        </form>
        <div class="container">
            <h2>Ajouter un nouvel utilisateur</h2>
            <a href="signin.php" class="btn btn-primary col-md-12">Inscription</a>
        </div> 

        <div class="container form-row">
            <div class="col-md-6">
                <h2>Liste des catégories</h2>
                <p>Attention la suppression d'une catégorie entraine la suppression de toutes les photos associées ! </p>
                <ul>
                <?php foreach($categories as $value) : ?>
                    <li><a href="php/deletecategorie.php?id=<?php echo htmlspecialchars($value['id']) ?>" ><i class="fas fa-trash-alt"></i></a> <?php echo htmlspecialchars($value['libelle']) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Liste des photos</h2>
                
                <?php foreach($photos as $value) : ?>
                    <div class="align">
                        <p>
                            <strong>Titre : <?php echo htmlspecialchars($value['nom']) ?></strong>
                            <a href="php/deletephoto.php?id=<?php echo htmlspecialchars($value['id']) ?>" ><i class="fas fa-trash-alt"></i></a>
                        </p>    
                        <img class="small" src="img/photos/<?php echo htmlspecialchars($value['src']) ?>" alt="<?php echo htmlspecialchars($value['description'])?>"/>
                        <p>Description : <?php echo htmlspecialchars($value['description'])?> </p>
                        <hr>
                    </div>
                <?php endforeach ?>
                
            </div>
        </div>


    <?php else : ?>
        <a href="connexion.phtml" class="btn btn-primary"> Se connecter </a>
    <?php endif ?>    
        
</main> 
<script src="js/admin.js"></script>
</body>
</html>
