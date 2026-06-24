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
}