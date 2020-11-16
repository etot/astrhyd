# astrhyd

## Description
Application de suivi des sites de démonstration pour la restauration hydromorphologique des cours d'eau

## Techno
symfony 5 / easyadmin 3

## bundles / modules utilisés
* composer require annotations
* composer require twig
* composer require --dev symfony/var-dumper
* comopser require doctrine/annotations
* composer require symfony/orm-pack
* composer require symfony/security-bundle
* composer require easycorp/easyadmin-bundle
* composer require --dev doctrine/doctrine-fixtures-bundle
* composer require symfony/http-client
* composer require symfony/serializer

## BDD
* 'php bin/console make:migration'
* 'php bin/console doctrine:migrations:migrate'