# cf2m-ecrivain-exe_mvc
Test d'intégration (examen ponctuel pour vérifier les acquis durant la formation) de blog avec pvc

## Test Affichage et insertion de livres

Récupérez exe_ecrivain2.sql et importez le dans phpmyadmin

### Structure

- page d'accueil
- page de période
- page de détail écrivain
- page de détail livre
- page du menu
- page d'admin

### La page d'accueil va afficher :

    Titre : Les auteurs du 16ème au 20ème siècle
    Menu - périodes (voir menu)
    Affichage de 3 résumés d'écrivains au hasard (ORDER BY RAND() LIMIT 3) avec :
            - lenom
            - la période (clicable avec une variable get nommée 'idperiode')
            - 200 caractères de la description de l'écrivain (sql!), 
            puis lire la suite avec une variable get nommée 'idecrivain' contenant l'id de l'écrivain

### La page de période va afficher :

    Titre: ~periode.laperiode~ siècle
    Menu - périodes (voir menu)
    Affichage de tous les résumés d'écrivains de cette période. "pas d'écrivain" affiché si vide
        - lenom
        - 250 caractères de la description de l'écrivain (sql!), 
        puis lire la suite avec une variable get nommée 'idecrivain' contenant l'id de l'écrivain

### La page du détail écrivain va afficher :

    Titre: ~lenom~
    Menu - périodes (voir menu)
        - lenom
        - la période (clicable avec une variable get nommée 'idperiode')
    Affichage du résumé complet de l'écrivain (avec retour automatique à la ligne)
    Affichage de tous les livres de l'écrivain clicables (avec une variable get 'idlivre') 
    classés par lasortie ascendant:
        - 'letitre'
        - Parution: 'lasortie'
        - 'ladescription' du livre (100 caractères en sql) puis lire la suite avec une variable get nommée 'idlivre'

### La page du détail livre va afficher:

    Titre: ~letitre~
    Menu - périodes (voir menu)
        - letitre
        - le nom de l'auteur du livre
        - la période liée à l'auteur
    Affichage du résumé complet du livre (avec retour automatique à la ligne)
        - 'letitre'
        - Parution: 'lasortie'
        - 'ladescription' du livre Affichage du résumé complet du livre (avec retour automatique à la ligne)
        - Affichage des autres livres du même auteur (simple lien clicable sur le titre) 

### Le menu va afficher:

    - Retour à l'accueil
    - affichage de toutes les périodes (depuis db) classée par id ASC,
    - lien vers une page ?admin

### On doit pouvoir ajouter des livres à des auteurs déja existants
