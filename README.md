# Analyse

# Objectifs : L'application Analyse à pour objectif de rédiger les cahiers d'analyses
# Prérequis

- Symfony 5.1,
- PHP 7.4.12,
- Composer 62
- SGBD MariaDb

# Procédure d'installation

- Préparer votre environnement Symfony + LAMP
- En cas de besoin vous trouverez la documentation de SYmfony à l'adresse suivante https://symfony.com/doc/current/setup.html
- Dans le terminal lancer la commande git clone https://github.com/Fibre44/Analyse.git
- Placer vous dans le répértoire puis renommer le fichier /env.dist en .env et éditer la configuration de MariaDb
- Dans le terminal lancer la commande composer install
- Dans le terminal lancer la commande php bin/console doctrine:migrations:migrate
- Dans le terminal lancer la commande symfony server:start
- Dans votre navigateur Web taper l'url http://localhost:8000/inscription

