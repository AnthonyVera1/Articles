<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Laravel, créé par Taylor Otwel, initie une nouvelle façon de concevoir un framework en utilisant ce qui existe de mieux pour chaque fonctionnalité. Par exemple toute application web a besoin d’un système qui gère les requêtes HTTP. Plutôt que de réinventer quelque chose, le concepteur de Laravel a tout simplement utilisé celui de Symfony en l’étendant pour créer un système de routage efficace. De la même manière, l’envoi des emails se fait avec la bibliothèque SwiftMailer. En quelque sorte Otwel a fait son marché parmi toutes les bibliothèques disponibles. Mais Laravel ce n’est pas seulement le regroupement de bibliothèques existantes, c’est aussi de nombreux composants originaux et surtout une orchestration de tout ça.

**Quelques fonctionnalités de Laravel** :

- un système de routage (RESTFul et ressources),
- un créateur de requêtes SQL et un ORM,
- un moteur de template,
- un système d’authentification pour les connexions,
- un système de validation,
- un système de pagination,
- un système de migration pour les bases de données,
- un système d’envoi d’emails,
- un système de cache,
- un système de gestion des événements,
- un système d’autorisations,
- une gestion des sessions,
- un système de localisation,
- un système de notifications…

### Laravel utilise le meilleur de PHP

Plonger dans le code de Laravel, c’est recevoir un cours de programmation tant le style est clair et élégant et le code bien organisé. La version actuelle de Laravel est la 8.0, elle nécessite au minimum la version 7.3 de PHP. Pour aborder de façon efficace ce framework, il serait souhaitable que vous soyez familiarisé avec ces notions :

- **les espaces de noms** : c’est une façon de bien ranger le code pour éviter des conflits de nommage. Laravel utilise cette possibilité de façon intensive. Tous les composants sont rangés dans des espaces de noms distincts, de même que l’application créée.
- **les fonctions anonymes** : ce sont des fonctions sans nom (souvent appelées closures) qui permettent d’améliorer le code. Les utilisateurs de Javascript y sont habitués. Les utilisateurs de PHP un peu moins parce qu’elle y sont plus récentes. Laravel les utilise aussi de façon systématique.
- **les méthodes magiques** : ce sont des méthodes qui n’ont pas été explicitement décrites dans une classe mais qui peuvent être appelées et résolues.
- **les interfaces** : une interface est un contrat de constitution des classes. En programmation objet c’est le sommet de la hiérarchie. Tous les composants de Laravel sont fondés sur des interfaces.
- **les traits** : c’est une façon d’ajouter des propriétés et méthodes à une classe sans passer par l’héritage, ce qui permet de passer outre certaines limitations de l’héritage simple proposé par défaut par PHP.

### La documentation

Quand on s’intéresse à un framework il ne suffit pas qu’il soit riche et performant, il faut aussi que la documentation soit à la hauteur. C’est le cas pour Laravel. Vous trouverez la documentation sur le site officiel. Mais il existe de plus en plus de sources d’informations dont voici les principales :

- https://laravel.fr : site d’entraide francophone avec un forum actif.
- http://www.laravel-tricks.com : un site d’astuces.
- https://laravel-news.com : un site regroupant pas mal d'actualité sur Laravel et des packages intéressants
- http://packalyst.com : le rassemblement de tous les packages pour ajouter des fonctionnalités à Laravel.
- https://laracasts.com : de nombreux tutoriels vidéo en anglais dont un certain nombre en accès gratuit.
- https://github.com/chiraggude/awesome-laravel : une page comportant une multitude de liens intéressants.

### Le modèle MVC

On peut difficilement parler d’un framework sans évoquer le patron Modèle-Vue-Contrôleur. Pour certains il s’agit de la clé de voûte de toute application rigoureuse, pour d’autres c’est une contrainte qui empêche d’organiser judicieusement son code. De quoi s’agit-il ?

**C’est un modèle d’organisation du code** :

- le modèle est chargé de gérer les données,
- la vue est chargée de la mise en forme pour l’utilisateur,
- le contrôleur est chargé de gérer l’ensemble.

En général on résume en disant que le modèle gère la base de données, la vue produit les pages HTML et le contrôleur fait tout le reste. Dans Laravel :

- le modèle correspond à une table d’une base de données. C’est une classe qui étend la classe Model qui permet une gestion simple et efficace des manipulations de données et l’établissement automatisé de relations entre tables,
- le contrôleur se décline en deux catégories : contrôleur classique et contrôleur de ressource (je détaillerai évidemment tout ça dans le cours),
- la vue est soit un simple fichier avec du code HTML, soit un fichier utilisant le système de template Blade de Laravel.

Laravel propose ce patron mais ne l’impose pas. Nous verrons d’ailleurs qu’il est parfois judicieux de s’en éloigner parce qu’il y a des tas de chose qu’on n’arrive pas à caser dans cette organisation. Par exemple si je dois envoyer des emails où vais-je placer mon code ? En général ce qui se produit est l’inflation des contrôleurs auxquels on demande des choses pour lesquelles ils ne sont pas faits.

### La Programmation Orientée Object (POO)

Laravel est fondamentalement orienté objet. La POO est un design pattern qui s’éloigne radicalement de la programmation procédurale. Avec la POO tout le code est placé dans des classes qui découlent d’interfaces qui établissent des contrats de fonctionnement. Avec la POO on manipule des objets.

Avec la POO, la responsabilité du fonctionnement est répartie dans des classes, alors que dans l’approche procédurale tout est mélangé. Le fait de répartir la responsabilité évite la duplication du code qui est le lot presque forcé de la programmation procédurale. Laravel pousse au maximum cette répartition en utilisant l’injection de dépendance.

L’utilisation de classes bien identifiées, dont chacune a un rôle précis, pilotées par des interfaces claires, dopées par l’injection de dépendances : tout cela crée un code élégant, efficace, lisible, facile à maintenir et à tester. C’est ce que Laravel propose. Alors vous pouvez évidemment greffer là dessus votre code approximatif, mais vous pouvez aussi vous inspirer des sources du framework pour améliorer votre style de programmation.

L’injection de dépendance est destinée à éviter de rendre les classes dépendantes et de privilégier une liaison dynamique plutôt que statique. Le résultat est un code plus lisible, plus facile à maintenir et à tester. Nous verrons ce mécanisme à l’œuvre dans Laravel.

### Cours

- I [L'environnement](https://github.com/La-boite-a-code/LIDEM-Laravel/blob/master/lessons/01-Environnement.md)
- II [L'installation](https://github.com/La-boite-a-code/LIDEM-Laravel/blob/master/lessons/02-Installation.md)
- III [Le routage](https://github.com/La-boite-a-code/LIDEM-Laravel/blob/master/lessons/03-Routage.md)
- IV [Les réponses](https://github.com/La-boite-a-code/LIDEM-Laravel/blob/master/lessons/04-Reponses.md)
  - V [Les Contrôleurs](https://github.com/La-boite-a-code/LIDEM-Laravel/blob/master/lessons/05-Controlleurs.md)

Programme de cours :

Les bases :

- Environnement et installation de Laravel
- Le routage :
  - Méthodes
  - Groupages
- Les réponses :
  - Automatiques
  - Construction d'une réponse
  - Les vues
  - Les redirections
- Les contrôleurs :
  - Artisan
  - Utilisation des Contrôleurs
  - Cas pratique + Correction
- Les formulaires
  - La validation des formulaires :
    - Dans le contrôlleur
    - Dans un fichier Request
- Les middlewares
- L'envoi d'emails :
  - MailTrap
  - Envoi d'emails
  
Les données :
- Les migrations et les modèles
- Utiliser les modèles
- Les relations :
  - 1:n
  - n:n
  - polymorphiques
- Les resources

La sécurité :
- Authentification
  - Fortify
  - Laravel Passport 
- La sécurité :
  - Rate Limiter
  - Injections SQL
  - CSRF
  - Formulaires (authorize)
  - Autorisations des utilisateurs (Policies)
- Aller plus loin :
  - Tests unitaires
  - Laravel Mix
  - Evènements
  
Projet Final : Réaliser un dashboard de maintenance et de prêts d'ordinateurs. Voici le cahier des charges :

- L'utilisateur peut se connecter accéder aux tableaux suivants :
- Ordinateurs disponibles : Modèle, Référence, Date d'entrée, Nombre d'interventions
- Ordinateurs en maintenance : Modèle, Référence, Date d'entrée en maintenance, Panne constatée
- Ordinateurs en prêts : Modèle, Référence, Date de prêt, Date de retour, Client

Il faut donc un outil pour gérer le parc informatique avec la liste des ordinateurs disponibles, un outil pour gérer les clients bénéficiants de prêts et un outil pour gérer les différents prêts.

Chaque ordinateur aura un historique des prêts et des opérations de maintenance qu'il aura subi. 

Chaque client aura un historique des ordinateurs qu'il se sera vu prêté 

Il sera possible de gérer les types d'interventions disponibles pour la maintenance.

Il faudra prévoir une API pour la connexion des utilisateurs (Token) et la consultation des ordinateurs :
- en maintenance
- prêtés
- disponibles