## Le système de routage

### Rappel

Le HTTP (Hypertext Transfer Protocol) est un protocole de communication entre un client et un serveur. Le client demande une ressource au serveur en envoyant une requête et le serveur réagit en envoyant une réponse, en général une page Html.

Quand on surfe sur Internet chacun de nos clics provoque en général cet échange, et plus généralement une rafale d’échanges.

La requête du client comporte un certain nombre d’informations (headers, status code, body…).

### Les méthodes

- **GET** : c’est la plus courante, on demande une ressource qui ne change jamais, on peut mémoriser la requête, on est sûr d’obtenir toujours la même ressource,
- **POST** : elle est aussi très courante, là la requête modifie ou ajoute une ressource, le cas le plus classique est la soumission d’un formulaire (souvent utilisé à tort à la place de PUT),
- **PUT** : on ajoute ou remplace complètement une ressource,
- **PATCH** : on modifie partiellement une ressource (donc à ne pas confondre avec PUT),
- **DELETE** : on supprime une ressource.

### .htaccess et index.php

Pour Laravel on veut que toutes les requêtes aboutissent obligatoirement sur le fichier index.php situé dans le dossier public. Pour y arriver on peut utiliser une URL de ce genre :

`http://monsite.fr/index.php/mapage`

Mais ce n’est pas très esthétique avec ce index.php au milieu. Si vous avez un serveur Apache lorsque la requête du client arrive sur le serveur où se trouve notre application Laravel elle passe en premier par le fichier .htaccess, s’il existe, qui fixe des règles pour le serveur. Il y a justement un fichier .htaccess dans le dossier public de Laravel avec une règle de réécriture de telle sorte qu’on peut avoir une url simplifiée :

`http://monsite.fr/mapage`

Lorsque la requête atteint le fichier public/index.php l’application Laravel est créée et configurée et l’environnement est détecté. Nous reviendrons plus tard plus en détail sur ces étapes. Ensuite le fichier **routes/web.php** est chargé. 

’est avec ce fichier que la requête va être analysée et dirigée. Regardons ce qu’on y trouve au départ :

```injectablephp
Route::get('/', function () {
    return view('welcome');
});
```
Comme Laravel est explicite vous pouvez déjà deviner à quoi sert ce code :

- Route : on utilise le routeur,
- get : on regarde si la requête a la méthode « get »,
- ‘/’ : on regarde si l’url comporte uniquement le nom de domaine,
dans la fonction anonyme on retourne (return) une vue (view) à partir du fichier « welcome ».
Ce fichier « welcome » se trouve bien rangé dans le dossier des vues : resources/views/welcome.blade.php

C’est ce fichier comportant du code Html qui génère le texte d’accueil que vous obtenez au démarrage initial de Laravel

### Utilisons les routes

Voici quelques exemples de route

```injectablephp
**
 * Une route GET classique qui retourne un contenu
 */
Route::get('salut', function() {
    return 'Salut, je suis une page de test';
});

/**
 * Une route avec un paramètre nécessaire
 */
Route::get('salut/{name}', function($name) {
    return 'Salut ' . ucfirst($name) . ', je suis une page de test avec un paramètre !';
});

/**
 * Une route avec un paramètre optionnel
 */
Route::get('optionnel/{name?}', function($name = null) {
    if( $name === null ) {
        return 'Salut, je ne contiens aucun paramètre';
    }

    return 'Salut, mon paramètre est le suivant : ' . $name;
});

/**
 * Une route avec un paramètre recquis qui doit obligatoirement être un nombre
 */
Route::get('number/{n}', function($n) {
    return $n;
})->where('n', '[0-9]+');

/**
 * Route avec un paramètre recquis qui ne doit contenir que du texte
 */
Route::get('string/{string}', function($string) {
    return $string;
})->where('string', '[a-z]+');

/**
 * Exemple d'une route nommée, quon pourra appeler grâce à la fonction
 * route('home')
 */
Route::get('home', function() {
    return 'Je suis la page d\'accueil';
})->name('home');
```

### Ordre des routes

Il est important de correcter ordonner vos routes par ordre de priorier, que se passera-t-il si jamais vous définissez les routes suivantes ?

```injectablephp
Route::get('{n}', function($n) {
    return 'Je suis la page ' . $n;
});

Route::get('test', function() {
    return 'Je suis une page de test';
});
```

Je vous tester et en tirer une conclusion ;)

### Le groupage des routes

Le groupage des routes vous permet d'avoir le même préfixe d'url pour différentes sections, et ainsi y appliquer un middleware global, une architecture de nom, etc.

Voici une exemple :

```injectablephp
Route::prefix('users')->name('users.')->group(function() {
   Route::get('/', function() {
       return 'Accueil espace membre';
   })->name('index');

   Route::get('/{name}', function($name) {
       return 'Bonjour je suis ' . ucwords(str_replace('-', ' ', $name));
   })->name('show');
});
```

Ce groupe ayant pour préfixe "users" nous permet d'écrire à l'intérieur toutes les urls qui commenceront par /users/. Voici les éléments à retenir :

- **prefix** : indique le préfixe de l'url, ainsi toutes les routes du groupe commenceront par users/
- **name** : préfixe du nom des routes, ainsi toutes les routes du groupe auront pour nom "users.[NOM_DE_MA_ROUTE]"
- **group** : le callback permettant de renseigner toutes les routes présentes dans le groupe

Vous remarquerez que toutes les routes ont ainsi été nommées avec comme prefix "users.". Nous pourrons donc par la suite appeler nos routes grâce à la fonction "route" :

```injectablephp
route('users.index'); // https://monsite.fr/users
route('users.show', ['name' => 'jean-michel-doe']); // https://monsite.fr/users/jean-michel-doe
```

Si jamais votre route doit contenir un paramètre, vous devez le renseigner dans la fonction Router avec le nom du paramètre que vous avez indiqué.