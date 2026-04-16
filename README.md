# Exercice PHP MVC JSON

## Objectif

Compléter une petite architecture MVC en PHP pour exposer des donnees Pokemon au format JSON, puis verifier directement le resultat dans le navigateur en modifiant l'URL.

Le but est de comprendre :

- le role du model dans la recuperation des donnees
- le role du controller dans l'orchestration
- le role d'un routage tres simple dans `index.php`
- le fonctionnement d'un point d'entree PHP consulte directement dans le navigateur

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

Le resultat JSON sera verifie directement dans le navigateur.

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
- le fichier doit servir de point d'entree unique pour toutes les requetes

### 4. Verification dans le navigateur

Une fois le routage en place, vous devez tester le resultat directement dans le navigateur.

Attendus :

- lancer le serveur PHP local
- saisir differents parametres dans l'URL pour tester les routes
- verifier que le navigateur affiche bien du JSON
- tester au minimum le cas d'un pokemon unique, la liste complete et le filtrage par generation

L'objectif est de comprendre comment une URL peut piloter le comportement du point d'entree PHP.

### 5. Ajouter un affichage HTML en plus du JSON

Vous devez maintenant permettre l'affichage d'un pokemon unique ou d'une liste de pokemons en HTML, en conservant la possibilite d'obtenir du JSON.

Attendus :

- ajouter deux nouvelles methodes dans `view.php` : une pour afficher un pokemon en HTML et une pour afficher une liste de pokemons en HTML
- creer une template HTML basique pour afficher un pokemon
- reutiliser cette meme template pour afficher plusieurs pokemons avec une boucle `foreach` en PHP+HTML
- faire en sorte que le controller recoive l'information indiquant si la reponse doit etre produite en JSON ou en HTML
- transmettre cette information depuis le routeur via un parametre `?json=true`
- si `?json=true` est present, continuer a utiliser les methodes JSON de la vue
- si `?json=true` est absent, utiliser les nouvelles methodes HTML de la vue
- conserver le meme principe de routes pour un pokemon unique et pour une liste de pokemons

Exemples de comportements attendus :

- une URL comme `index.php?action=pokemon&id=25&json=true` doit afficher le pokemon au format JSON
- une URL comme `index.php?action=pokemon&id=25` doit afficher le pokemon au format HTML
- une URL comme `index.php?action=pokemons&generation=1&json=true` doit afficher la liste au format JSON
- une URL comme `index.php?action=pokemons&generation=1` doit afficher la liste au format HTML

Contraintes :

- ne pas dupliquer l'affichage HTML dans le controller
- le controller doit choisir la bonne methode de `view.php` selon l'information recue depuis le routeur
- le routeur doit seulement lire les parametres de l'URL et transmettre l'information au controller
- la presentation HTML doit rester simple, lisible et faite avec PHP integre dans du HTML
- la template de base d'un pokemon ne doit pas etre reecrite une seconde fois pour la liste
- rester dans la logique MVC deja mise en place

Exemple de boucle possible pour afficher plusieurs pokemons dans une vue HTML :

```php
<?php foreach ($pokemons as $pokemon): ?>
    <article>
        <h2><?= htmlspecialchars($pokemon['name']) ?></h2>
        <p>ID : <?= htmlspecialchars($pokemon['id']) ?></p>
    </article>
<?php endforeach; ?>
```

## Organisation attendue

- `model.php` : recupere et decode les donnees distantes
- `controller.php` : appelle le model puis choisit la bonne reponse a produire via la vue
- `view.php` : renvoie du JSON ou genere du HTML pour le navigateur
- `index.php` : point d'entree, routage basique et lecture du parametre `?json=true`

## Conseils

- testez chaque etape separement
- commencez par faire fonctionner la liste complete des pokemons
- ajoutez ensuite le filtrage par generation
- terminez par le routage dans `index.php`
- testez vos routes en changeant directement l'URL dans le navigateur
- verifiez ensuite les deux formats de sortie : JSON avec `?json=true` et HTML sans ce parametre
