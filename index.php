<?php

class Personnage {
    public string $nom;
    public int $pv;
    public int $force;
    public int $x;
    public int $y;

    public function __construct($nom, $pv, $force, $x, $y) {
        $this->nom = $nom;
        $this->pv = $pv;
        $this->force = $force;
        $this->x = $x;
        $this->y = $y;
    }

    public function deplacer($direction) {
        if ($direction == "Haut")   $this->y--;
        if ($direction == "Bas")    $this->y++;
        if ($direction == "Gauche") $this->x--;
        if ($direction == "Droite") $this->x++;
        
        echo "[DEPLACEMENT] " . $this->nom . " se deplace vers le " . $direction;
    }

    public function attaquer($cible) {
        echo "[ATTAQUE] " . $this->nom . " attaque " . $cible->nom . " !\n";
        $cible->recevoirDegats($this->force);
    }

    public function recevoirDegats($degats) {
        $this->pv -= $degats;
        if ($this->pv < 0) $this->pv = 0; // Evite les PV negatifs
        echo "[DEGATS] " . $this->nom . " perd " . $degats . " PV. (PV restants : " . $this->pv . ")\n";
    }
}


echo "=== CREATION DES PERSONNAGES ===\n";
$joueur = new Personnage("Heros", 100, 50, 0, 0); // Nom, PV, Force, X, Y
$monstre = new Personnage("Gobelin", 40, 10, 0, 1);

echo "\n=== DEPLACEMENT ===\n";
$joueur->deplacer("Bas"); 

echo "\n=== COMBAT ===\n";
$joueur->attaquer($monstre);

if ($monstre->pv > 0) {
    $monstre->attaquer($joueur);
} else {
    echo "[INFO] " . $monstre->nom . " est mort et ne peut pas repliquer.\n";
}

echo "\n=== FIN DE LA SIMULATION ===\n";