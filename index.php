	<?php include('php/header.php') ?>
    <?php include('php/affichage.php') ?>
		
</header>

<main class="main_index">

    <cite> &ldquo; Pourquoi je me passionne pour la photo ? Pour montrer aux personnes que le monde qui nous entoure est magnifique, qu'au détour de chaque sentier ce trouve un puits d'inspiration, mais surtout qu'en prenant le temps de regarder et non de voir, le monde devient magique ! &rdquo;</cite>

	<form method="POST" action="php/recherche.php">
		<label for="recherche" class="displayLabel">Afficher une catégorie</label>
		<select name="categorie" id="categorie">
            <option value="0">Toute</option>
            <?php foreach($categories as $value) : ?>
            <option value="<?php echo htmlspecialchars($value['id']) ?>"><?php echo htmlspecialchars($value['libelle']) ?></option>
            <?php endforeach ?>
        </select>
		<button type="submit" class="buttonTransparent"><i class="fas fa-filter"></i></button>
	</form>
		

    <div class="galerie">
    

        <?php 
        foreach($photos as $index) {
        echo'<a href="photo.php?id='.htmlspecialchars($index['id']).'"><img  src="img/photos/'.htmlspecialchars($index['src']).'" alt="'.htmlspecialchars($index['description']).'"/></a>';
        }
        ?>

    </div>


    <a href="#"><i class="fas fa-angle-double-up" id="go_top"></i></a>

</main> 

<footer class="footer-accueil">

    <?php include('php/footer.php') ?>	

