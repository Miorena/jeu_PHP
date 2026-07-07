<?php
class Personnage
{
	public string $nom;
	public int $pv;
	public int $force;
	public int $x;
	public int $y;

	public function __construct(string $nom, int $pv, int $force, int $x, int $y)
	{
		$this->nom = $nom;
		$this->pv = $pv;
		$this->force = $force;
		$this->x = $x;
		$this->y = $y;
	}

	public function estVivant(): bool
	{
		return $this->pv > 0;
	}

	public function seDeplacer(string $direction): bool
	{
		$ancienX = $this->x;
		$ancienY = $this->y;

		switch ($direction) {
			case 'z':
				if ($this->y > 0) $this->y--;
				break;
			case 's':
				if ($this->y < 9) $this->y++;
				break;
			case 'q':
				if ($this->x > 0) $this->x--;
				break;
			case 'd':
				if ($this->x < 9) $this->x++;
				break;
		}

		return ($this->x !== $ancienX || $this->y !== $ancienY);
	}

	public function distance(Personnage $autre): int
	{
		return abs($this->x - $autre->x) + abs($this->y - $autre->y);
	}

	public function attaquer(Personnage $cible): int
	{
		$cible->pv -= $this->force;
		if ($cible->pv < 0) {
			$cible->pv = 0;
		}
		return $this->force;
	}
}