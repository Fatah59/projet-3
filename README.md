## Projet n°3 : Créez un blog pour un écrivain.
## Parcours OpenClassRooms : Chef de projet multimédia  - développement.

**Résumé de l'énoncé :** 

Développer une application blog simple en Php avec une base de données MySQL. L'application doit avoir une interface frontend et une interface backend (administration). L'application doit comporter tous les éléments d'un CRUD.

**Fonctionnalités**

Frontend : 
 - lecture des billets.
 - ajout de commentaires.
 - signalement de commentaire pour modération.
 - formulaire d'adhésion à la newsletter avec l'envoi d'un email à la personne inscrite.
 - formulaire de désinscription à la newsletter.
 - formulaire de contact avec l'envoi d'un email à l'administrateur du site.
 - formulaire de connexion à la partie administration avec login et mot de passe.

Backend : 
 - Tableau de bord résumant le nombre de billets, commentaires et signalements.
 - Ajout, édition et suppression des billets.
 - Affichage de tous les commentaires pour modération.
 - Affichage des commentaires signalés pour modération ou retrait du signalement.
 - déconnexion de la partie administration.
 
 
 **Version de Php**
 
- 7.2 minimum.
 
 **Base de données**
 
 - MySQL.
 
**Installation**

1 - Télécharger ou cloner le projet.  
2 - Installer composer afin de gérer l'autoload (documentation : https://getcomposer.org/doc/ et instruction de téléchargement https://getcomposer.org/download/).  
3 - Installer tinyMCE.  
4 - Installer PHPMailer et modifier les rubriques de la classe qui sera créée pour envoyer les emails (voir l'exemple dans le Readme de PHPMailer : https://github.com/PHPMailer/PHPMailer). Utiliser une class Login.php pour y définir les constantes EMAIL et PASSWORD.  
5 - Renommer le fichier DbManagerSample en DbManager et y définir le nom de la base de données, le nom d'utilisateur et le mot de passe.  
6 - Créer une base de données sur MySQL.  
7 - Créer les tables nécessaires avec les scripts suivant : 

- Structure de la table `chapter`

 DROP TABLE IF EXISTS `chapter`;
 CREATE TABLE IF NOT EXISTS `chapter` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `title` varchar(255) NOT NULL,
   `text` text NOT NULL,
   `creation_date` datetime NOT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
 
 - Structure de la table `comment`
 
 DROP TABLE IF EXISTS `comment`;
 CREATE TABLE IF NOT EXISTS `comment` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `pseudo` varchar(255) NOT NULL,
   `text` text NOT NULL,
   `creationDate` datetime NOT NULL,
   `report` tinyint(4) NOT NULL DEFAULT '0',
   `moderate` tinyint(4) NOT NULL DEFAULT '0',
   `chapterId` int(11) NOT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
 
 - Structure de la table `contact`
 
 DROP TABLE IF EXISTS `contact`;
 CREATE TABLE IF NOT EXISTS `contact` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `username` varchar(255) NOT NULL,
   `userMessage` text NOT NULL,
   `email` varchar(255) NOT NULL,
   `sendDate` datetime NOT NULL,
   `processed` tinyint(1) DEFAULT NULL,
   `consent` tinyint(1) NOT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
 
 - Structure de la table `member`
 
 DROP TABLE IF EXISTS `member`;
 CREATE TABLE IF NOT EXISTS `member` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `login` varchar(255) NOT NULL,
   `password` varchar(255) NOT NULL,
   `token` varchar(255) DEFAULT NULL,
   `token_date` datetime DEFAULT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
 
 - Structure de la table `newsletter`
 
 DROP TABLE IF EXISTS `newsletter`;
 CREATE TABLE IF NOT EXISTS `newsletter` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `email` varchar(255) NOT NULL,
   PRIMARY KEY (`id`),
   UNIQUE KEY `email` (`email`)
 ) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
 
 7 - Le mot de passe de la partie administration est à définir et à hasher (voir documentation : https://www.php.net/manual/fr/function.password-hash.php).