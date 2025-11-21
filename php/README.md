Systeme de gestion e-commerce
## Installation
Prérequis
PHP 8.1 ou supérieur
# Cloner le dépôt
git clone <https://github.com/HindSarra/Systeme-de-gestion-e-commerce.git>
cd Systeme-de-gestion-e-commerce
Vérifier que PHP est installé :
php -v
## Description

Ce projet est un système de gestion d'e-commerce en PHP.  
Il permet de lire les données clients, produits, commandes, zones de livraison et promotions depuis des fichiers CSV (`legacy/data`) et de calculer les totaux, remises, taxes et points de fidélité.  

## Structure du projet

php/
├─ src/
│ ├─ run.php # Point d'entrée pour lancer le test
│ ├─ Models/ # Entités métier typées
│ │ ├─ Customer.php
│ │ ├─ Product.php
│ │ ├─ Order.php
│ │ ├─ ShippingZone.php
│ │ └─ Promotion.php
│ └─ Loaders/ # Chargeurs CSV
│ ├─ CustomerLoader.php
│ ├─ ProductLoader.php
│ ├─ OrderLoader.php
│ ├─ ShippingZoneLoader.php
│ └─ PromotionLoader.php
│ └─ Services/ # Logique métier isolée
│ └─ OrderCalculator.php
├─ legacy/
│ └─ data/ # Fichiers CSV d'entrée
│ ├─ customers.csv
│ ├─ products.csv
│ ├─ orders.csv
│ ├─ shipping_zones.csv
│ └─ promotions.csv
└─ README.md



Utilisation

    Placer vos fichiers CSV dans legacy/data/ :

    customers.csv

    products.csv

    orders.csv

    shipping_zones.csv

    promotions.csv

    Lancer le script principal :

php src/run.php
Le fichier `src/run.php` est le **point d'entrée principal** pour tester le système.  
Le script :



============================================
Explication des choix de conception
============================================

Explication simple des choix
============================================

 Séparer calculs et lecture/écriture
--------------------------------------
- Tout ce qui calcule les totaux, remises, taxes, points fidélité
  est dans OrderCalculator.
- run.php sert juste à lire les fichiers et afficher les résultats.
- Pourquoi : ça rend le code plus simple à comprendre et à tester.
  On peut vérifier les calculs sans toucher aux fichiers.

Chaque fichier CSV a son propre "Loader"
--------------------------------------------
- CustomerLoader pour customers.csv, ProductLoader pour products.csv, etc.
- Chaque loader crée des objets pour chaque ligne du fichier.
- Pourquoi : ça évite de copier-coller le code de lecture à plusieurs endroits
  et ça rend le code plus clair.

Utiliser des objets pour chaque chose
----------------------------------------
- Les clients, produits, commandes, zones, promotions sont des objets.
- Pourquoi : on sait exactement quelles infos chaque objet contient,
  et on peut ajouter des méthodes pour faire des calculs plus facilement.
Organisation des dossiers
-----------------------------
- Models/  les objets
- Loaders/ pour lire les fichiers CSV
- Services/  pour calculs
- run.php  pour tout lancer et afficher les résultats
- legacy/data/ les fichiers CSV
- Pourquoi : tout est bien rangé et on sait où chercher ce qu’on veut changer.

 Affichage console concentré
-------------------------------
- Les echo/printf sont seulement dans run.php
- Pourquoi : ça sépare la logique de calcul et l’affichage.
 
Résumé :
---------
- Le code est plus simple, plus clair et plus facile à tester.
- Si on change un fichier CSV ou l’interface, il y aura moins de risques
  de casser le calcul des totaux.
