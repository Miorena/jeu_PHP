<?php
require_once 'personnage.php';

$heroX = rand(0, 9);
$heroY = rand(0, 9);

do {
	$monstreX = rand(0, 9);
	$monstreY = rand(0, 9);
} while ($heroX === $monstreX && $heroY === $monstreY);

$hero = new Personnage("Hero", 100, 30, $heroX, $heroY);
$monstre = new Personnage("Monstre", 100, 20, $monstreX, $monstreY);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mini RPG Game</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<h1>Mini RPG Game</h1>
	<p>Déplacement: <strong>W, S, A, D</strong> | Attaquer: <strong>Clic gauche</strong> quand le hero est
		<strong>SUR</strong> le monstre
	</p>

	<div class="header-jeu">
		<div>
			<p>Joueur: <span id="hero-pv"><?php echo $hero->pv ?></span> PV</p>
			<p>Monstre: <span id="monstre-pv"><?php echo $monstre->pv ?></span> PV</p>
		</div>

		<button onclick="window.location.reload();" class="btn-rejouer">Rejouer</button>
	</div>

	<div class="jeu-conteneur">

		<div class="jeu-conteneur">

			<div id="plateau">
				<?php
				for ($y = 0; $y < 10; $y++) {
					for ($x = 0; $x < 10; $x++) {
						echo "<div class='case' id='case-$x-$y'></div>";
					}
				}
				?>
			</div>

			<div id="console">[System] Le jeu est prêt ! Déplacez-vous.</div>

		</div>

		<script>
			let hero = { nom: "<?php echo $hero->nom; ?>", pv: <?php echo $hero->pv; ?>, force: <?php echo $hero->force; ?>, x: <?php echo $hero->x; ?>, y: <?php echo $hero->y; ?> };
			let monstre = { nom: "<?php echo $monstre->nom; ?>", pv: <?php echo $monstre->pv; ?>, force: <?php echo $monstre->force; ?>, x: <?php echo $monstre->x; ?>, y: <?php echo $monstre->y; ?> };
		</script>

		<script src="script.js"></script>

</body>

</html>