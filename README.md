# Mini RPG Game ⚔️

Un mini-jeu de rôle en 2D au tour par tour développé en **PHP (Programmation Orientée Objet)**, **HTML**, **CSS** et **JavaScript**. 

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

## 🛠️ Installation et Lancement local

### Prérequis
* Avoir **PHP** (version 7.4 ou supérieure recommandée) installé sur votre machine informatique.

### Étapes de lancement
1. Clonez ce dépôt ou téléchargez les fichiers dans un dossier local.
2. Ouvrez votre terminal dans ce dossier :
   ```bash
   cd /chemin/vers/votre/dossier
