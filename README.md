#  EasyShop - Produits et Prix

## Description
**EasyShop** est une plateforme simple permettant d'afficher des produits avec leurs prix et descriptions.  
Il utilise **AJAX** pour charger dynamiquement les produits sans recharger la page.  

⚠️ **Note** : Ce site est uniquement une vitrine. **Aucun achat n'est possible.**  

---

##  Fonctionnalités
- **Recherche en temps réel** des produits avec **AJAX**  
- **Filtrage dynamique** des produits par catégorie  
- **Affichage des détails d'un produit** au survol de la souris  
- **Gestion des produits et catégories** via une base de données MySQL  

---

## Technologies utilisées
- **Front-end** : HTML, CSS, Bootstrap  
- **Back-end** : PHP, MySQL  
- **Dynamisme** : jQuery, AJAX  

---

## Installation et Configuration

###
  1- Cloner le projet  
```bash
git clone https://github.com/KoloinaRan/EasyShop-ProduitsEtPrix.git
```
  2- Configurer la base de données
Ouvrir phpMyAdmin et créer une base de données nommée produits.

Importer le fichier produits.sql situé dans le dossier database/.

  3- Modifier la connexion à la base de données
Dans config.php, adapter les informations :

  4- Lancer le serveur local (WAMP, XAMPP)
Démarrer Apache et MySQL, puis ouvrir le projet dans le navigateur : http://localhost/EasyShop-ProduitsEtPrix

---

##  Démonstration des Fonctionnalités
- Recherche AJAX: Lorsqu'un utilisateur tape un mot-clé, les produits correspondants s'affichent instantanément sans recharger la page.
- Filtrage par catégorie: Un menu de filtres permet d'afficher uniquement les produits d’une catégorie spécifique.
- Détails des produits au survol: Quand on passe la souris sur un produit, ses détails s'affichent avec un effet dynamique.

---

## Contribution
Tu peux proposer des améliorations en faisant un fork du projet et en créant une pull request.

---

## Auteur
Développé par KoloinaRandriarisoa
Contact : randriarisoak@gmail.com


