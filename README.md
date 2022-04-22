# bookingTrain-Mvc
# Contexte du projet
Une compagnie locale qui gére le transport des trains à besoin d'une application pour la gestion des réservation en respectant les consignes suivantes :

​

Un client peut réserver plusieurs voyages.

Un admin peut créer ou annuler un voyage.

Une réservation concerne un seul voyage et un seul passager.

Si un voyage est complet il faut pas l'afficher dans le resultat de recherche. Le nombre des places à réserver est limité. les clients peuvent annuler leurs réservation (d'une limite 1 h avant le voyage).

​

# Structure de l'application :

​

++Technologies++ : Backend (PHP (MVC,POO) , Mysql ) , Frontend (Html,css,bootstrap,js,sass)

​

Réaliser la conception UML de l'application (diagramme de cas d'utilisation et diagramme de classe).

Une page d’accueil pour chercher un voyage (gare de départ , gare de d'arrivée , date , prix)

​

Une page réservation qui contient les informations sur le voyage selectionné et un formulaire de voyage à remplir , le formulaire s'adapte selon le choix (aller-simple ou aller-retour),possibilité de réserver le voyage pour plusieurs personnes en introduisant leurs informations personnelles tout en respectant la limite des places disponibles dans le voyage sélectionné,(pour le client le formulaire est auto renseigné , pour un utilisateur un message de réponse avec un envoi d'email de récapitulatif de réservation(Optionnel)).

​

Une page mes voyages qui affiche la totalité des voyages réservés (on garde l'historique des réservations du client).

​

Zone (Sign In/Sign Up) pour authentifier les clients et les admins.

​

 # Partie Technique :

​

Respectez le model MVC et appliquer les principes POO.

Ajouter une page pour la création des voyages (pour les admin), et l'annulation des voyages (ne pas supprimer depuis la base de données).

Ajouter une page utilisateur qui présente les informations de l'utilisateur connecté avec ses données personnelles (Client ou Admin).

Utilisation du Bootstrap.

Utilisation du Sass (Optionnel).

Utilisation du JS pour faire le formulaire dynamiqu
