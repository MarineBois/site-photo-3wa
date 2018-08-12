	<?php include('php/header.php') ?>
    <?php include('php/affichage.php') ?>
		
</header>
        <main>
            <a href="index.php" class="returnButton">X</a>
            <img src="img/photos/<?=htmlspecialchars($photo['src'])?>" class="photo" alt="<?=htmlspecialchars($photo['description'])?>"> 
            <h1 class="align"><?=htmlspecialchars($photo['nom'])?></h1>
            <p class="align"><?=htmlspecialchars($photo['description'])?></p>
        </main>    
    </body>
</html>