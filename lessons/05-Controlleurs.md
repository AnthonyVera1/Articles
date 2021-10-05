Pour correctement organiser son code dans une application Laravel il faut bien répartir les tâches. Dans les exemples vus jusqu’à présent j’ai renvoyé une vue à partir d’une route, vous ne ferez pratiquement jamais cela dans une application réelle (même si personne ne vous empêchera de le faire ! ). Les routes sont juste un système d’aiguillage pour trier les requêtes qui arrivent.

_Mais alors qui s’occupe de la suite ?_

Et bien ce sont les contrôleurs, le sujet de ce chapitre.

Nous allons aussi découvrir l’outil Artisan qui est la boîte à outil du développeur pour Laravel.

## Artisan

Lorsqu’on construit une application avec Laravel on a de nombreuses tâches à accomplir, comme par exemple créer des classes, vérifier les routes…

C’est là qu’intervient Artisan, le compagnon indispensable. Il fonctionne en ligne de commande, donc à partir de la console. Il suffit de se positionner dans le dossier racine et d’utiliser la commande :

```
php artisan
```

Et voici ce que vous retourne cette commande :

```
Laravel Framework 8.62.0

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
      --env[=ENV]       The environment the command should run under
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  clear-compiled       Remove the compiled class file
  db                   Start a new database CLI session
  down                 Put the application into maintenance / demo mode
  env                  Display the current framework environment
  help                 Display help for a command
  inspire              Display an inspiring quote
  list                 List commands
  migrate              Run the database migrations
  optimize             Cache the framework bootstrap files
  serve                Serve the application on the PHP development server
  test                 Run the application tests
  tinker               Interact with your application
  up                   Bring the application out of maintenance mode
 auth
  auth:clear-resets    Flush expired password reset tokens
 cache
  cache:clear          Flush the application cache
  cache:forget         Remove an item from the cache
  cache:table          Create a migration for the cache database table
 config
  config:cache         Create a cache file for faster configuration loading
  config:clear         Remove the configuration cache file
 db
  db:seed              Seed the database with records
  db:wipe              Drop all tables, views, and types
 event
  event:cache          Discover and cache the application's events and listeners
  event:clear          Clear all cached events and listeners
  event:generate       Generate the missing events and listeners based on registration
  event:list           List the application's events and listeners
 key
  key:generate         Set the application key
 make
  make:cast            Create a new custom Eloquent cast class
  make:channel         Create a new channel class
  make:command         Create a new Artisan command
  make:component       Create a new view component class
  make:controller      Create a new controller class
  make:event           Create a new event class
  make:exception       Create a new custom exception class
  make:factory         Create a new model factory
  make:job             Create a new job class
  make:listener        Create a new event listener class
  make:mail            Create a new email class
  make:middleware      Create a new middleware class
  make:migration       Create a new migration file
  make:model           Create a new Eloquent model class
  make:notification    Create a new notification class
  make:observer        Create a new observer class
  make:policy          Create a new policy class
  make:provider        Create a new service provider class
  make:request         Create a new form request class
  make:resource        Create a new resource
  make:rule            Create a new validation rule
  make:seeder          Create a new seeder class
  make:test            Create a new test class
 migrate
  migrate:fresh        Drop all tables and re-run all migrations
  migrate:install      Create the migration repository
  migrate:refresh      Reset and re-run all migrations
  migrate:reset        Rollback all database migrations
  migrate:rollback     Rollback the last database migration
  migrate:status       Show the status of each migration
 model
  model:prune          Prune models that are no longer needed
 notifications
  notifications:table  Create a migration for the notifications table
 optimize
  optimize:clear       Remove the cached bootstrap files
 package
  package:discover     Rebuild the cached package manifest
 queue
  queue:batches-table  Create a migration for the batches database table
  queue:clear          Delete all of the jobs from the specified queue
  queue:failed         List all of the failed queue jobs
  queue:failed-table   Create a migration for the failed queue jobs database table
  queue:flush          Flush all of the failed queue jobs
  queue:forget         Delete a failed queue job
  queue:listen         Listen to a given queue
  queue:monitor        Monitor the size of the specified queues
  queue:prune-batches  Prune stale entries from the batches database
  queue:prune-failed   Prune stale entries from the failed jobs table
  queue:restart        Restart queue worker daemons after their current job
  queue:retry          Retry a failed queue job
  queue:retry-batch    Retry the failed jobs for a batch
  queue:table          Create a migration for the queue jobs database table
  queue:work           Start processing jobs on the queue as a daemon
 route
  route:cache          Create a route cache file for faster route registration
  route:clear          Remove the route cache file
  route:list           List all registered routes
 sail
  sail:install         Install Laravel Sail's default Docker Compose file
  sail:publish         Publish the Laravel Sail Docker files
 schedule
  schedule:list        List the scheduled commands
  schedule:run         Run the scheduled commands
  schedule:test        Run a scheduled command
  schedule:work        Start the schedule worker
 schema
  schema:dump          Dump the given database schema
 session
  session:table        Create a migration for the session database table
 storage
  storage:link         Create the symbolic links configured for the application
 stub
  stub:publish         Publish all stubs that are available for customization
 vendor
  vendor:publish       Publish any publishable assets from vendor packages
 view
  view:cache           Compile all of the application's Blade templates
  view:clear           Clear all compiled view files

```

Nous verrons par la suite à quoi servent ces commandes au fur et à mesure que nous les utiliserons.

## Les contrôleurs

La tâche d’un contrôleur est de réceptionner une requête (qui a déjà été sélectionnée par une route) et de définir la réponse appropriée, rien de moins et rien de plus. Voici une illustration du processus :

Pour créer un contrôleur, vous pouvez exécuter la commande suivante :

```
php artisan make:controller LessonsController
```

Et si tout se passe bien, vous devriez trouver une classe LessonController dans le dossier app/Http/Controllers :

```injectablephp
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonsController extends Controller
{
    //
}
```

Nous pouvons aggrémenter notre contrôleur en lui créant une première fonction, que nous nommerons par convention index, comme ceci :

```injectablephp
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function index()
    {
        return view('lessons');
    }
}
```

Analysons notre code :

Analysons un peu le code :

- on trouve en premier l’espace de nom (App\Http\Controllers),
- le contrôleur hérite de la classe Controller qui se trouve dans le même dossier et qui permet de factoriser des actions communes à tous les contrôleurs,
- on trouve enfin la méthode index qui renvoie quelque chose que maintenant vous connaissez : une vue, en l’occurrence « lessons » dont nous avons déjà parlé. Donc si j’appelle cette méthode je retourne la vue « lessons » au client.

Cette fonction retournera une vue que nous allons créer de ce pas :

```html
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma page lessons</title>
</head>
<body>
<p>Nous sommes sur la page Lesson, qui utilise le contrôleur LessonController</p>
</body>
</html>
```

Maintenant, pour rendre notre contrôleur utilisable, nous allons devoir le lier à nos routes. Nous allons donc créer une nouvelle route et la nommer :

```injectablephp
Route::get('lessons', [LessonController::class, 'index'])->name('lessons');
```

Désormais si vous vous rendez sur monsite.fr/lessons vous aurez bien votre page de cours affichée, appelée par vos routes.

## Cas pratique

Maintenant imaginons un cas pratique avec un système d'articles. Je vous fournirais un fichier json de test contenant une série d'articles.

Mission : Réaliser un listing d'articles grâce aux données récupérées du fichier articles.json. Il vous faudra une méthode permettant de lister les articles, et une autre permettant d'afficher le contenu d'un article. Il faudra créer les routes et les vues associées. 

Je vous conseille de stocker le fichier articles.json dans le repertoire resources/data. Pour récupérer le chemin du fichier vous pouvez utiliser la fonction resource_path : 

```injectablephp
resource_path('data/articles.json');
```

Pensez à sécuriser vos paramètres de routes, à nommer vos routes car je vous demanderais de pouvoir naviguer de page en page.

**Bonus** : Réaliser une pagination pour naviguer d'article en article en cliquant sur suivant ou précédent.