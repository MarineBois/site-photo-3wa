/******************************************************/
/*              Marine-bois-photo                     */
/******************************************************/

Projet parrallèle de mon site web photo pour être rendu en tant que projet pour valider le diplome RNCP (3Wa)
La fonction d'ajout d'un utilistaur a été rajouté par rapport au site original.

/*          FONCTIONNALITES     */

    =>  INDEX :
        Affichage sur la page d'accueil des photos enregistrées, en 3 colonnes.
        Possibilité de faire un filtre par catégorie pour afficher les photos.
        Le clic sur une image renvoi sur une page affichat l'immage. 

    =>  CONNEXION :
        Si l'utilisateur n'est pas encore connecté le formulaire s'affiche,
        sinon un lien vers l'administration s'affiche.
        Envoi des données de connexion en Ajax vers php/submit.php

    =>  ADMINISTRATION :
        Vérification que l'utilisateur est bien connecté pour afficher la page
        sinon renvoi sur la page de connextion.
        Formulaire d'ajout de photo sur le site :
            vérification du type de fichier pris en charge
            vérification de la taille du fichier (2Mo)
            ensuite la photo est enregistré dans le dossier img/photos
        Formulaire d'ajout d'une nouvelle catégorie :
            mise à jour de la bdd
        Possibilité d'ajouter un nouvel utilisateur :
            renvoi sur la page signin.php
        Boutton de déconnection 
        Liste des catégorie :
            Avec la possibilité de supprimer une catégorie
        Liste des photos :
            Avec la possibilité de supprimer une photo       

    =>  SIGN IN :
        Ce formulaire est accessible si l'utilisateur est connecté.
        Car seul un utilisateur déjà authentifié peut créer un nouvel utilisateur.               


/*        UTILITIES         */

Une  exportation de la bdd de donnée test est dans le dossier bdd.

Un utilisateur a été créer dans la base de donnée pour les test :
mail : admin@admin.fr
password : admin