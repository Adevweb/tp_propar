TP_PROPAR : Laurie Brun et Adrien Benoit 

-Upload la BDD propar.sql présente dans BDD>propar.sql : Les triggers et procédure stockée y sont présent


- HTACCESS : Admin //  MDP : 123 -> Protège tous les fichier, même le cnx.php


-Utilisateur pour évaluation : 	
	Profil nouveau : Login -> john // MDP -> azert1
	Profil avec des données : Login -> adnbnt // MDP -> azert1


- /!\ Pour créer un utilisateur : mettre un mot de passe avec au moins 1 lettres et 1 chiffres d'une taille comprise entre 6 et 30 caractères./!\
(Si vous le créer manuellement en BDD et que vous ne respectez pas cela, vous ne pourrez pas vous connecter par la suite (regex + md5))

////////////////////////////////////////////////////////////////////

UML : src/tp_propar/Conception/UML/UML.zargo

MCD/MLD : src/tp_propar/Conception/PROPAR.mcd

xMind : src/tp_propar/Conception/connexion.php.xmind

Maquette : src/tp_propar/view/maquette

Trigger : src/tp_propar/BDD/trigger.sql (Les 3 triggers sont dans le même fichier)
	- Un trigger qui lors d'une suppression d'opérations dans la table 'operation' modifie son statut en 'terminer' et l'ajoute à la table 'end_ope'
	- Les deux autres triggers transforme les nom/prenom et/ou le type en majuscule avant de l'insérer en BDD.

Procédures stockées : src/tp_propar/BDD/procStockee.sql

Log4php : src/tp_propar/log/myLog.log : Mit un peu partout pour tracer : connexion, ajout d'opérations/utilisateur etc... Autant pour success que pour error.

Design Pattern : MVC

Trello : https://trello.com/b/mp1NO9ar/propar


Ajax/Js : src/tp_propar/view/js
view/connexion.php appel view/js/cnx.js qui cible controler/cnx_action.php pour la validation des login
view/addUser.php appel view/js/addUser.js qui cible controler/addUser_action.php pour l'ajout d'un utilisateur

POO : /model
- Classe abstraite : employe_class.php
- Classe : 
	singleton_class.php
	apprenti_class.php
	client_class.php
	cnx_class.php
	expert_class.php
	operation_class.php
	senior_class.php


BitBucket : 
	Branche v1.0 : https://bitbucket.org/adevweb/tp_propar/src/v1.0/
	Branche master : https://bitbucket.org/adevweb/tp_propar/src/master/
(invitation envoyé à mafhim@insy2s.com)


MVC : 
- view/connexion.php envoie vers controler/cnx_action.php qui renvoie vers view/homeUser OU view/homeAdmin en fonction du type d'utilisateur ou sur view/cnxError.php en cas d'erreur

En partant du principe que l'on est sur view/homeAdmin.php (Vu que c'est le menu avec le plus de fonctionnalités et que le User contient les mêmes) : 

-AJOUTER UNE OPERATION : view/homeAdmin.php appel controler/clientListFROMmenu_action.php qui renvoie sur view/addOpe.php, en fonction de l'opération ajoutée il renvoie soit vers succes/error. Si le client n'existe pas il renvoie vers view/addClient.php
	-AJOUTER CLIENT : view/addClient.php envoie vers controler/addClient.php puis vers view/success ou error.php

-TERMINER UNE OPERATION : view/homeAdmin.php appel controler/current_opeFROMmenu_action.php qui renvoie sur view/endOpe.php

-AJOUTER UN UTILISATEUR : view/homeAdmin.php appel controler/userListFROMmenu_action.php qui renvoie sur view/addUser.php
	-MODIFIER UN UTILISATEUR : view/addUser.php envoie sur modifyUser_action.php qui renvoie sur controler/type_control.php qui renvoie vers un des deux menu en fonction du type d'utilisateur

-LISTE OPERATIONS EN COURS : view/homeAdmin.php appel controler/currentOpe_action.php qui renvoie sur view/currentOpe.php

-VOIR LE CHIFFRE D'AFFAIRES : view/homeAdmin.php appel controler/seeCA_action.php qui renvoie vers view/seeCA.php


Sur chaque page il y a un petit bouton en bas qui renvoie vers controler/type_controle.php qui controle le type d'utilisateur connecté

Chaque page d'ajout d'opération, suppression d'opérations, ajout utilisateur, ajoute client et autres envoie vers une page de succès ou d'erreur qui ensuite envoie vers controler/type_control.php

Toutes les pages peuvent se déconnecter en cliquant sur le logo de sortie en haut à droite de la page.