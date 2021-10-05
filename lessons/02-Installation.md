### Prérequis

Composer fonctionne en ligne de commande. Vous avez donc besoin de la console (nommée Terminal ou Konsole sur OS X et Linux). Les utilisateurs de Linux sont très certainement habitués à l’utilisation de la console mais il en est généralement pas de même pour les adeptes de Windows. Pour trouver la console sur ce système il faut chercher l’invite de commande.

Si vous utilisez Laragon, vous avez une console améliorée (Cmder) accessible via le bouton "Terminal".

### Installation

Il y a plusieurs façons de créer une application Laravel. La plus classique consiste à utiliser la commande create-project de composer. Par exemple je veux créer une application dans un dossier "MonSuperSite" à la racine de mon serveur, voici la syntaxe à utiliser :

`composer create-project --prefer-dist laravel/laravel MonSuperSite`

Une fois la commande lancée, l'installation démarre. Il n'y a plus qu'à attendre. Vous pourrez ensuite consulter votre projet fraichement installé en lançant la commande :

`php artisan serve`

ou bien en passant par votre virtualHost. Si vous utilisez Laravel Valet vous pouvez lancer les commandes suivantes :

`valet link
valet secure`

et vous rendre sur https://monsupersite.test

### Présentation de l'arborescence

#### Le dossier app :

Il contient tous les éléments essentiels de notre application

- **Console** : toutes les commandes en mode console,
- **Exceptions** : pour gérer les erreurs d’exécution,
- **Http** : tout ce qui concerne la communication : contrôleurs, middlewares (il y a 7 middlewares de base qui servent à filtrer les requêtes HTTP) et le kernel,
- **Providers** : tous les fournisseurs de services (providers), il y en a déjà 5 au départ. Les providers servent à initialiser les composants.
- **Models** : le dossier des modèles avec déjà un présent qui concerne les utilisateurs.

#### Les autres dossiers

- **bootstrap** : scripts d’initialisation de Laravel pour le chargement automatique des classes, la fixation de l’environnement et des chemins, et pour le démarrage de l’application,
- **public** : tout ce qui doit apparaître dans le dossier public du site : images, CSS, scripts…
- **config** : toutes les configurations : application, authentification, cache, base de données, espaces de noms, emails, systèmes de fichier, session…
- **database** : migrations et populations,
- **resources** : vues, fichiers de langage et assets (par exemple les fichiers Sass),
- **routes** : la gestion des urls d’entrée de l’application,
- **storage** : données temporaires de l’application : vues compilées, caches, clés de session…
- **tests** : fichiers de tests unitaires,
- **vendor** : tous les composants de Laravel et de ses dépendances (créé par composer).

#### Les fichiers à la racine

- artisan : outil en ligne de Laravel pour des tâches de gestion,
- composer.json : fichier de référence de composer,
- package.json : fichier de référence de npm pour les assets,
- phpunit.xml : fichier de configuration de phpunit (pour les tests unitaires),
- .env : fichier pour spécifier l’environnement d’exécution.

### Accessibilité

Pour des raisons de sécurité, seul le dossier public de votre arborescence est consultable sur le serveur. 

### Autorisations

Au niveau des dossiers de Laravel, les seuls qui ont besoin de droits d’écriture par le serveur sont storage (et ses sous-dossiers), et bootstrap/cache.


### Configuration de l'environnement

Le fichier .env a la racine de votre projet contient toutes les informations d'accès et de connexion pour votre projet. Ainsi on y retrouve les paramètres de debugage, les informations de connexion à la base de donnée, les identifiants pour l'envoi des emails, etc.

```dotenv
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:rdyWXb/dbu5tuVRdGvN2nSBYkzHGrn6Wh1IXVeHwxR8=
APP_DEBUG=true
APP_URL=http://lesson.test

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lesson
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

