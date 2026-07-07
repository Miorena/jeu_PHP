<?php
require_once 'personnage.php';
session_start();

// --- Initialisation / Réinitialisation de la partie ---
if (isset($_GET['reset']) || !isset($_SESSION['hero'])) {
	$heroX = rand(0, 9);
	$heroY = rand(0, 9);

	do {
		$monstreX = rand(0, 9);
		$monstreY = rand(0, 9);
	} while ($heroX === $monstreX && $heroY === $monstreY);

	$_SESSION['hero'] = new Personnage("Hero", 100, 30, $heroX, $heroY);
	$_SESSION['monstre'] = new Personnage("Monstre", 100, 20, $monstreX, $monstreY);
	$_SESSION['console'] = "[System] Le jeu est prêt ! Déplacez-vous.";

	// On évite de garder ?reset=1 dans l'URL après rechargement
	if (isset($_GET['reset'])) {
		header('Location: index.php');
		exit;
	}
}

$hero = $_SESSION['hero'];
$monstre = $_SESSION['monstre'];

// --- Traitement des actions (déplacement / attaque) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

	if ($_POST['action'] === 'move' && $hero->estVivant()) {
		$direction = $_POST['direction'] ?? '';
		if ($hero->seDeplacer($direction)) {
			$_SESSION['console'] = "[Mouvement] {$hero->nom} se déplace en [{$hero->x}, {$hero->y}]";
		}
	}

	if ($_POST['action'] === 'attack' && $hero->estVivant() && $monstre->estVivant()) {
		if ($hero->distance($monstre) <= 1) {
			$degatsInfliges = $hero->attaquer($monstre);
			$message = "[Attaque] Vous infligez {$degatsInfliges} dégâts au monstre";

			if ($monstre->estVivant()) {
				$degatsRecus = $monstre->attaquer($hero);
				$message .= "\n[Riposte] Le monstre vous inflige {$degatsRecus} dégâts !";
			} else {
				$message .= "\n[Victoire] Le monstre est mort !";
			}

			$_SESSION['console'] = $message;
		} else {
			$_SESSION['console'] = "[Info] Trop loin pour attaquer ! Rapprochez-vous du monstre rouge.";
		}
	}

	$_SESSION['hero'] = $hero;
	$_SESSION['monstre'] = $monstre;

	// Pattern Post/Redirect/Get : on évite qu'un F5 renvoie l'action
	header('Location: index.php');
	exit;
}

$consoleTexte = $_SESSION['console'];
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
	<p>Déplacement: <strong>boutons Z, S, Q, D</strong> | Attaquer: <strong>bouton Attaquer</strong> quand le hero
		est <strong>À CÔTÉ</strong> du monstre (ou dessus)</p>

	<div class="header-jeu">
		<div>
			<p>Joueur: <span id="hero-pv"><?php echo $hero->pv; ?></span> PV</p>
			<p>Monstre: <span id="monstre-pv"><?php echo $monstre->pv; ?></span> PV</p>
		</div>

		<a href="index.php?reset=1" class="btn-rejouer">Rejouer</a>
	</div>

	<div class="jeu-conteneur">

		<div class="jeu-conteneur">

			<div id="plateau">
				<?php
				for ($y = 0; $y < 10; $y++) {
					for ($x = 0; $x < 10; $x++) {

						$estHero = $hero->estVivant() && $hero->x === $x && $hero->y === $y;
						$estMonstre = $monstre->estVivant() && $monstre->x === $x && $monstre->y === $y;

						if ($estMonstre) {
							// Case cliquable pour attaquer, stylée comme une case normale
							echo "<form method='post' action='index.php' class='case-form'>";
							echo "<input type='hidden' name='action' value='attack'>";
							echo "<button type='submit' class='case monstre' id='case-$x-$y'>Monstre</button>";
							echo "</form>";
						} else {
							$classe = $estHero ? 'case hero' : 'case';
							$texte = $estHero ? 'Hero' : '';
							echo "<div class='$classe' id='case-$x-$y'>$texte</div>";
						}
					}
				}
				?>
			</div>

			<div id="console"><?php echo nl2br(htmlspecialchars($consoleTexte)); ?></div>

		</div>

		<div class="controles">
			<form method="post" action="index.php" class="pad">
				<input type="hidden" name="action" value="move">

				<div></div>
				<button type="submit" name="direction" value="z" class="btn-direction" <?php echo $hero->estVivant() ? '' : 'disabled'; ?>>Z</button>
				<div></div>

				<button type="submit" name="direction" value="q" class="btn-direction" <?php echo $hero->estVivant() ? '' : 'disabled'; ?>>Q</button>
				<div></div>
				<button type="submit" name="direction" value="d" class="btn-direction" <?php echo $hero->estVivant() ? '' : 'disabled'; ?>>D</button>

				<div></div>
				<button type="submit" name="direction" value="s" class="btn-direction" <?php echo $hero->estVivant() ? '' : 'disabled'; ?>>S</button>
				<div></div>
			</form>
		</div>

</body>

</html>