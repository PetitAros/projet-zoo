# Fichier de configuration du serveur

Ce fichier permet de définir les configurations faites sur le serveur.

## Informations sur le serveur

### Informations diverses

Adresse du serveur sur le réseau de l'IUT: `10.31.32.157`

Nom de l'utilisateur sudo : `root`  
Mot de passe de l'utilisateur sudo : AUCUN

## Installation d'un SSH et de Nano

SSH Déjà installé dans la configuration minimale UBUNTU

Installation de Nano

```
apt-get install nano
```

## Mise à jour des dépots apt.

Mise à jour des dépots

```
apt-get update
```

Mise à jour des paquets installés

```
apt-get upgrade
```

## Installation de Apache2

Installation de Apache2

```terminal
apt-get install apache2
```

## Installation de PHP

```
apt-get install php
apt-get install libapache2-mod-php
```

Édition du fichier conf pour commenter les 5dernières lignes.

## Installation de MySQL

Installation de MYSQL-Server

```
apt-get install mysql-server
```

## Configuration de MySQL

Accès à MySQL

```
mysql
```

Création et dons des accès à un utilisateur 'saezoo'

```
CREATE USER 'saezoo'@'localhost' IDENTIFIED BY 'saezoo';
GRANT ALL PRIVILEGES ON *.* TO 'saezoo'@'localhost' WITH GRANT OPTION;
exit
```

User : `saezoo`  
Password : `saezoo`

## Installation PhpMyAdmin

```
apt-get install phpmyadmin
```

password : `saezoo`

## Configuration de Apache2

Création d'une configuration de VHost afin d'héberger le projet.

## Installation de Symfony

Installation de composer

```
apt-get install composer
```

Installation de symfony

```
curl -sS https://get.symfony.com/cli/installer | bash
```

## Installation de NodeJS

Installation de NVM

```
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
```

Exportation de NVM dans les variables d'environment dans le bashrc.

Reload du bashrc

```
source ~/.bashrc
```

Installation de NodeJS et de NPM

```
nvm install -lts
```

Lancement du build de la version de prod du projet

```
npm run build
```

## Mise en place du projet

Installation du projet :

- Installations liées à composer
- Installations liées à NPM
- Environement du projet passé en DEV dans le .env.local
- Création des données
