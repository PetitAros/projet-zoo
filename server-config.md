# Fichier de configuration du serveur

Ce fichier permet de définir les configurations faites sur le serveur.

## Informations sur le serveur

Adresse du serveur sur le réseau de l'IUT: `10.31.32.214`

Nom de l'utilisateur sudo : `root`  
Mot de passe de l'utilisateur sudo : AUCUN

## Installation d'un SSH

SSH Déjà installé dans la configuration minimale UBUNTU

## Installation de Apache2

Installation de Apache2

```terminal
sudo apt-get install apache2
```

Ajout des répertoires par utilisateurs

```
user@saeZoo:/home$ sudo chown -R user:www-data user
user@saeZoo:/home& cd user
user@saeZoo:~$ sudo chown -R user:www-data public_html/
```

Désactivation du système d'index

```
user@saeZoo:/etc/apache2/mods-enabled$ sudo nano userdir.conf
```
