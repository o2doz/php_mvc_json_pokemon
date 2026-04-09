# Exercice PHP MVC JSON

## Objectif

Compléter une petite architecture MVC en PHP pour exposer des donnees Pokemon au format JSON, puis la consommer depuis un fichier HTML/JavaScript.

Le but est de comprendre :

- le role du model dans la recuperation des donnees
- le role du controller dans l'orchestration
- le role d'un routage tres simple dans `index.php`
- l'appel d'une API PHP depuis le JavaScript du navigateur

## Travail a faire

### 1. Completer `model.php`

Vous devez terminer la fonction `getPokemons()` dans `model.php`.

Attendus :

- si aucun identifiant de generation n'est fourni, recuperer la liste complete des pokemons depuis l'API distante
- si un identifiant de generation est fourni, recuperer uniquement les pokemons de cette generation
- utiliser les proprietes deja presentes dans la classe pour construire l'URL
- recuperer la reponse distante avec `file_get_contents`
- convertir le JSON recu en donnees PHP avec `json_decode`
- retourner le resultat decode

Contraintes :

- ne pas changer le nom de la methode
- ne pas ecrire la logique dans le controller a la place du model
- chercher dans la documentation ou tester l'API pour comprendre quel endpoint appeler selon le cas

### 2. Completer `controller.php`

Vous devez terminer la fonction `getPokemons()` dans `controller.php`.

Attendus :

- appeler la methode correspondante du model
- recuperer le resultat renvoye par le model
- transmettre ce resultat a la vue pour produire une reponse JSON
- prendre en compte le parametre de generation si celui-ci est fourni

Contraintes :

- ne pas dupliquer la logique de construction d'URL dans le controller
- le controller doit seulement coordonner model et view

### 3. Faire un routage ultra basique dans `index.php`

Le serveur PHP sera appele depuis le JavaScript.

Vous devez donc remplacer l'appel direct actuel par un routage tres simple base sur les parametres de l'URL.

Attendus :

- lire les parametres recus dans la requete
- prevoir au minimum une route pour recuperer un pokemon unique
- prevoir une route pour recuperer la liste des pokemons
- permettre eventuellement de filtrer par generation sur la route de liste
- appeler la bonne methode du controller selon les parametres recus

Exemples de comportements attendus :

- une URL doit permettre d'obtenir un seul pokemon par id ou par nom
- une autre URL doit permettre d'obtenir tous les pokemons
- une autre variante doit permettre d'obtenir les pokemons d'une generation

Contraintes :

- rester sur un routage tres simple, avec des conditions basiques
- inutile d'utiliser un framework ou un routeur complexe
- le fichier doit servir de point d'entree pour les appels `fetch` du JavaScript

### 4. Partie `index.html`

La partie front devra ensuite appeler votre serveur PHP avec `fetch`.

Place order pour la consigne JS + HTML a completer plus tard :

- preparer une fonction JavaScript qui appelle `index.php`
- construire l'URL en fonction du besoin : un pokemon, tous les pokemons, ou une generation
- verifier le statut HTTP de la reponse
- convertir la reponse en JSON
- afficher le resultat dans la console ou dans la page
- prevoir dans le HTML une zone d'affichage minimale pour voir le resultat

Je completerai moi-meme les consignes detaillees JS + HTML.

## Organisation attendue

- `model.php` : recupere et decode les donnees distantes
- `controller.php` : appelle le model puis envoie la reponse via la vue
- `view.php` : renvoie du JSON au navigateur
- `index.php` : point d'entree et routage basique
- `index.html` : client JavaScript qui appelle le serveur PHP

## Conseils

- testez chaque etape separement
- commencez par faire fonctionner la liste complete des pokemons
- ajoutez ensuite le filtrage par generation
- terminez par le routage dans `index.php`
- utilisez le navigateur et l'onglet reseau pour verifier les URL appelees
