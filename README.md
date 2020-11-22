# Analyse

# Objectifs : L'application Analyse à pour objectif de rédiger les cahiers d'analyses
# Prérequis

- Symfony 5.1,
- PHP 7.4.12,
- Composer 62
- SGBD MariaDb

# Procédure d'installation

- Préparer votre environnement Symfony + LAMP
- En cas de besoin vous trouverez la documentation de Symfony à l'adresse suivante https://symfony.com/doc/current/setup.html
- Sur votre serveur Linux placer vous dans /var/html/www
- Dans le terminal lancer la commande git clone https://github.com/Fibre44/Analyse.git
- Placer vous dans le répértoire Analyse
- Placer vous dans le répértoire puis renommer le fichier /env.dist en .env et éditer la configuration de MariaDb (le fichier .env se trouver dans le .gitignore attention à ne pas l'upload sur github :-) )
- Dans le terminal lancer la commande composer install (composer va installera les dépendances vous devez etre en PHP version 7.4.12 minimum)
- Dans le terminal lancer la commande php bin/console doctrine:migrations:migrate
- Dans le terminal lancer la commande symfony server:start
- Dans votre navigateur Web taper l'url http://localhost:8000/inscription

