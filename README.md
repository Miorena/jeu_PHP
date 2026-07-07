# Mini RPG Game ⚔️

Un mini-jeu de rôle en 2D au tour par tour développé **entièrement en PHP (Programmation Orientée Objet)**, avec **HTML5** et **CSS3** pour l'affichage. Aucun JavaScript n'est utilisé : chaque action (déplacement, attaque, rejouer) est traitée côté serveur via des formulaires, et l'état de la partie est conservé dans une session PHP.

Le projet est entièrement modularisé en suivant les bonnes pratiques de développement (séparation de la logique métier et du style).

## 🚀 Fonctionnalités

* **Plateau dynamique 10x10 :** Grille générée dynamiquement via PHP.
* **Génération Aléatoire :** Les positions de départ du Héros et du Monstre sont générées aléatoirement à chaque lancement, en évitant qu'ils n'apparaissent sur la même case.
* **Système de combat :** Attaque au corps-à-corps (bouton sur la case du monstre, actif à une case de distance) avec riposte automatique du monstre s'il survit.
* **Console d'action :** Un journal de logs situé à droite du plateau affiche le dernier mouvement, les dégâts infligés/reçus, ainsi que l'état de la partie.
* **Bouton Rejouer :** Permet de réinitialiser la partie et de repositionner aléatoirement les entités d'un seul clic.
* **État persistant en session PHP :** La position et les PV des personnages sont conservés entre chaque rechargement de page grâce à `$_SESSION`.

## 📁 Architecture du Projet

Le code est structuré de manière propre et lisible :

* `personnage.php` : Contient la classe PHP `Personnage` (propriétés, constructeur, et toute la logique métier : `seDeplacer()`, `distance()`, `attaquer()`, `estVivant()`).
* `index.php` : Point d'entrée unique du jeu. Gère la session, traite les actions envoyées en `POST` (déplacement, attaque, reset) selon le pattern Post/Redirect/Get, puis affiche le plateau et la console à partir de l'état courant.
* `style.css` : Gestion complète du design (mise en page `Flexbox`, affichage de la grille en `CSS Grid`, couleurs, boutons).

## 🎮 Commandes du jeu

* **Déplacements :** Cliquez sur les boutons **Z** (Haut), **S** (Bas), **Q** (Gauche), **D** (Droite) affichés sous le plateau.
* **Attaque :** Cliquez sur la case du Monstre (carré rouge) lorsque votre Héros (carré bleu) est sur une case adjacente (ou la même case).

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