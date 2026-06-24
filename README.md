# Mini RPG Game ⚔️

Un mini-jeu de rôle en 2D au tour par tour développé en **PHP (Programmation Orientée Objet)**, **HTML5**, **CSS3** et **JavaScript**. 

Le projet est entièrement modularisé en suivant les bonnes pratiques de développement (séparation de la logique métier, du style et de l'interactivité).

## 🚀 Fonctionnalités

* **Plateau dynamique 10x10 :** Grille générée dynamiquement via PHP.
* **Génération Aléatoire :** Les positions de départ du Héros et du Monstre sont générées aléatoirement à chaque lancement, en évitant qu'ils n'apparaissent sur la même case.
* **Système de combat :** Attaque au corps-à-corps (clic gauche sur le monstre à une case de distance) avec riposte automatique du monstre s'il survit.
* **Console d'action :** Un journal de logs vertical situé à droite du plateau affiche en temps réel les mouvements, les dégâts infligés, reçus, ainsi que l'état de la partie.
* **Bouton Rejouer :** Permet de réinitialiser la partie et de repositionner aléatoirement les entités d'un seul clic.

## 📁 Architecture du Projet

Le code est structuré de manière propre et lisible :

* `Personnage.php` : Contient la classe PHP `Personnage` (logique POO : propriétés, constructeur).
* `index.php` : La vue principale (structure HTML, instanciation des personnages en PHP, transmission des données vers le JS).
* `style.css` : Gestion complète du design (Mise en page `Flexbox`, affichage de la grille en `CSS Grid`, couleurs).
* `script.js` : Contrôleur gérant les événements clavier, la logique de déplacement, le calcul des distances et le système de combat.

## 🎮 Commandes du jeu

* **Déplacements :** Utilisez les touches **Z** (Haut), **S** (Bas), **Q** (Gauche), **D** (Droite) de votre clavier.
* **Attaque :** Faites un **clic gauche** avec la souris directement sur le Monstre (carré rouge) lorsque votre Héros (carré bleu) est sur une case adjacente.

## 🛠️ Étapes de lancement

1. **Installez PHP** sur votre machine si ce n'est pas déjà fait (version 7.4 ou supérieure). Vous pouvez tester sa présence dans votre terminal avec : `php -v`.
2. **Téléchargez les fichiers** du projet ou clonez le dépôt Git avec la commande :  
   `git clone <URL_DE_VOTRE_DEPOT_GITHUB>`
3. **Ouvrez un terminal** et déplacez-vous directement dans le dossier du projet :  
   `cd le-nom-du-dossier`
4. **Exécutez la commande** suivante pour démarrer le serveur web local de PHP :  
   `php -S localhost:8000`
5. **Lancez votre navigateur web** et accédez au jeu via l'adresse suivante :  
   👉 [http://localhost:8000](http://localhost:8000)

---
Développé dans un cadre académique pour la validation des compétences en POO PHP et en intégration Web interactive.
