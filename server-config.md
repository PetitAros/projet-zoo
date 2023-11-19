# Fichier de configuration du serveur

Ce fichier permet de définir les configurations faites sur le serveur.

## Informations sur le serveur

Adresse du serveur sur le réseau de l'IUT: `10.31.32.214`

Nom de l'utilisateur sudo : `root`  
Mot de passe de l'utilisateur sudo : AUCUN

## Installation d'un SSH

SSH Déjà installé dans la configuration minimale UBUNTU

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
