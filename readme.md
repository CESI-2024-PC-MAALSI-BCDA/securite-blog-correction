# 🔓 Sécurité Web — Application pédagogique OWASP Top 10

Ce projet est une application PHP orientée objet volontairement vulnérable. Il a été conçu pour permettre aux développeurs, étudiants ou passionnés de cybersécurité de **découvrir, exploiter et comprendre les failles de sécurité web** recensées par l’OWASP Top 10.

> 🎯 Objectif : explorer 12 failles OWASP directement via l’interface, sans consulter le code source.

---

## 📦 Technologies utilisées

- PHP 8.x (programmation orientée objet)
- MySQL (via PDO)
- Composer (autoload PSR-4)
- Apache (XAMPP, MAMP…)
- TailwindCSS via CDN
- Aucune authentification externe

---

## 🚀 Installation

1. **Cloner ce dépôt Git :**

   Depuis GitHub :  
   https://github.com/JulienGrade/securite-blog.git

2. **Placer le dossier dans votre répertoire web local**, exemple :
   /Applications/XAMPP/htdocs/securite-blog/

3. **Créer la base de données :**

- Nom : `securite_blog`
- Importer le fichier `script.sql` inclus dans le projet, via phpMyAdmin ou ligne de commande.

4. **Installer les dépendances avec Composer :**

Depuis la racine du projet :
> `composer install`


5. **Lancer le projet :**

Démarrer Apache et MySQL depuis XAMPP/MAMP puis ouvrir dans votre navigateur :
http://localhost/securite-blog/
A adapter selon votre architecture de dossier.

> Le fichier `.htaccess` est déjà configuré pour rediriger les URLs propres. Assurez-vous que `mod_rewrite` est activé.

---

## 🎓 Objectif pédagogique

L'application est conçue comme un **véritable terrain d’audit**. Vous devrez :

- 🔍 Identifier 12 failles présentes dans l’interface
- 🧪 Tester leur exploitabilité depuis un navigateur
- 🧠 Les comprendre sans lire le code source

---

## 🔒 Consignes

- ❌ Ne pas lire le code PHP
- ❌ Ne pas consulter directement la base
- ❌ Ne pas utiliser d’extension qui lit les fichiers sources

Utilisez uniquement le navigateur et les outils développeur pour repérer les vulnérabilités.

---

## 🎯 Fonctionnalités disponibles

- 🔐 Connexion / Inscription
- ✍️ Création et édition d’articles
- 🧑‍💼 Interface administrateur
- 🔍 Moteur de recherche
- 📨 Formulaire de contact
- 🔐 Générateur de hash
- 📄 Pages statiques : à propos, mentions légales

---

## 🧪 Failles présentes

12 failles OWASP ont été implantées volontairement dans l’application.


---

## 📚 Mission

1. Identifiez un comportement anormal ou suspect
2. Tentez de l’exploiter
3. Notez comment reproduire la faille
4. Proposez une solution pour la corriger

Vous pouvez utiliser des outils de test d’intrusion, des dictionnaires, ou l'inspecteur réseau.

---

## ⚠️ Avertissement

> Cette application ne doit être utilisée **que dans un environnement local sécurisé**, à des fins pédagogiques.
> Ne jamais déployer ce code tel quel en production. Les failles sont réelles et fonctionnelles.

---

## 🙋‍♂️ Auteur

Projet conçu et maintenu par [Julien Grade](https://github.com/JulienGrade)

Formateur / Développeur freelance 
---

## 📬 Contact

Une question ? Un retour ?  
Utilisez la [page de contact](http://localhost/securite-blog/page/contact) directement dans l’application.

---


