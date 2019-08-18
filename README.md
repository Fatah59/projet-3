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
 - Affichage des commentaires non signalés pour modération.
 - Affichage des commentaires signalés pour modération ou retrait du signalement.
 - Bouton de déconnexion de la partie administration.
 
 
 **Version de Php**
 
- 7.2 minimum.
 
 **Base de données**
 
 - MySQL.
 
**Installation**

1 - Télécharger ou cloner le projet.  
2 - Installer composer afin de gérer l'autoload (documentation : https://getcomposer.org/doc/ et instruction de téléchargement https://getcomposer.org/download/).  
3 - tinyMCE sera installé par composer et si besoin télécharger le Language Packages souhaité : https://www.tiny.cloud/get-tiny/language-packages/ et le coller en créeant un dossier langs dans vendor/tinymce)  
4 - Pour utiliser PHPMailer, complétez les constantes EMAIL, PASSWORD et HOST de la classe LoginSample.php qu'il faudra renommer Login.php (plus d'informations sur PHPMailer : https://github.com/PHPMailer/PHPMailer).  
5 - Renommer le fichier DbManagerSample.php en DbManager.php et y définir le domaine, le nom de la base de données, le nom d'utilisateur et le mot de passe.  
7 - Créer une base de données sur MySQL.  
8 - Installer la structure des tables et les données avec les liens suivants :  
 [structure](./sql/structure.sql)  
 [données](./sql/données.sql)  
9 - Le mot de passe de la partie administration est à redéfinir et à hasher (voir documentation : https://www.php.net/manual/fr/function.password-hash.php) puis à ajouter en base de données avec le login existant ou celui de votre choix.
 