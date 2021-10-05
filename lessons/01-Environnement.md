Pour fonctionner correctement, Laravel a besoin d'un certain environnement :

###Configuration recquise 

- Un serveur avec PHP 7.3 au minimum
- MySQL 5.7 (de préférence)
- Node.JS
- Composer
- De certaines extensions

### Développer sous Laravel

Pour commencer, avant toute mise en production, il est conseillé de développer sur sa machine, et selon votre système d'exploitation, il existe des solutions adaptées :

- Pour Windows : Laragon 
- Pour Mac ou Linux : HomeStead avec Vagrant
- Pour Mac : Valet

### Composer

Je vous ai dit dans le précédent chapitre que Laravel utilise des composants d’autres sources. Plutôt que de les incorporer directement, il utilise un gestionnaire de dépendances : composer. D’ailleurs pour le coup les composants de Laravel sont aussi traités comme des dépendances. Mais c’est quoi un gestionnaire de dépendances ?

Imaginez que vous créez une application PHP et que vous utilisez des composants issus de différentes sources : Carbon pour les dates, Redis pour les données… Vous pouvez utiliser la méthode laborieuse en allant chercher tout ça de façon manuelle, et vous allez être confronté à des difficultés :

Télécharger tous les composants dont vous avez besoin et les placer dans votre structure de dossiers,
traquer les éventuels conflits de nommage entre les librairies,
mettre à jour manuellement les librairies quand c’est nécessaire,
prévoir le code pour charger les classes à utiliser…
Tout ça est évidemment faisable mais avouez que s’il était possible d’automatiser les procédures ce serait vraiment génial. C’est justement ce que fait un gestionnaire de dépendances !

Voilà à quoi ressemble le fichier composer de Laravel après une installation :

```json
{
    "name": "laravel/laravel",
    "type": "project",
    "description": "The Laravel Framework.",
    "keywords": ["framework", "laravel"],
    "license": "MIT",
    "require": {
        "php": "^7.3|^8.0",
        "fruitcake/laravel-cors": "^2.0",
        "guzzlehttp/guzzle": "^7.0.1",
        "laravel/framework": "^8.54",
        "laravel/sanctum": "^2.11",
        "laravel/tinker": "^2.5"
    },
    "require-dev": {
        "facade/ignition": "^2.5",
        "fakerphp/faker": "^1.9.1",
        "laravel/sail": "^1.0.1",
        "mockery/mockery": "^1.4.2",
        "nunomaduro/collision": "^5.0",
        "phpunit/phpunit": "^9.3.3"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi"
        ]
    },
    "extra": {
        "laravel": {
            "dont-discover": []
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true
    },
    "minimum-stability": "dev",
    "prefer-stable": true
}
```

### Les extensions nécessaires 

Pour fonctionner correctement, Laravel a besoin de PHP :

- Version >= 7.3.0,
- Extension PDO,
- Extension Mbstring,
- Extension OpenSSL,
- Extension Tokenizer,
- Extension XML,
- Extension BCMath,
- Extension Ctype,
- Extension JSON
- Extension Fileinfo