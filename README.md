Projet d'Authentification 🎉


Ce projet implémente un système d'authentification complet, permettant aux utilisateurs de s'inscrire ✍️, de se connecter 🔑 et de naviguer sur une page d'accueil 🏠 après la connexion. Le système inclut des fonctionnalités de gestion des sessions pour sécuriser l'accès aux différentes pages de l'application. Le projet utilise des technologies telles que PHP pour le back-end et MySQL pour la gestion des utilisateurs.
Fonctionnalités principales ✨

Inscription (Register) ✍️

    L'utilisateur peut s'inscrire en remplissant un formulaire avec ses informations (pseudo, email, mot de passe).
    Le mot de passe est crypté avant d'être stocké dans la base de données 🔒.
    Vérification des informations d'inscription (ex : validation de l'email et de la complexité du mot de passe).
    Si l'inscription réussit, l'utilisateur est redirigé vers la page de connexion. 🔄

Connexion (Login) 🔑

    L'utilisateur peut se connecter avec son email 📧 et son mot de passe.
    Le système vérifie que les informations sont correctes ✅.
    Si la connexion est réussie, l'utilisateur est redirigé vers la page d'accueil. 🎉
    Un système de gestion de session est mis en place pour garder l'utilisateur connecté. 🔒

Page d'accueil (Home) 🏠

    Une page d'accueil accessible uniquement après la connexion de l'utilisateur 🔑.
    Cette page contient un message de bienvenue 🙌 et un lien pour se déconnecter.

Traitement ⚙️

    Les données d'inscription et de connexion sont traitées par des scripts PHP qui vérifient les informations dans la base de données.
    Des vérifications côté serveur (par exemple, validation du format de l'email, vérification de la correspondance du mot de passe) sont effectuées avant d'enregistrer ou de valider une connexion.
    Des messages d'erreur sont affichés en cas d'échec 🚫 (par exemple, si les informations sont incorrectes ou si l'email est déjà utilisé).

Technologies utilisées 💻

    Back-end : PHP pour le traitement des formulaires et la gestion des sessions.
    Base de données : mySQL pour stocker les informations des utilisateurs (pseudo, email, mot de passe).
    Front-end : HTML, CSS,  pour les formulaires et la gestion des interfaces utilisateurs.
    Sécurité : Cryptage des mots de passe via password_hash() et password_verify() en PHP.

Sécurité 🔐

    Le mot de passe des utilisateurs est crypté avant d'être stocké dans la base de données pour garantir la sécurité des informations sensibles.
    Un système de gestion de session est utilisé pour maintenir la connexion de l'utilisateur, et les sessions sont sécurisées.

Auteur 👨‍💻

Projet développé par Laury dans le cadre d’un exercice de développement web avec Elan Formation.
