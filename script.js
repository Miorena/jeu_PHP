const consoleLog = document.getElementById("console");

function miseAJourDuPlateau() {
  document.querySelectorAll(".case").forEach((c) => {
    c.className = "case";
    c.innerText = "";
  });

  if (hero.pv > 0) {
    let caseHero = document.getElementById(`case-${hero.x}-${hero.y}`);
    if (caseHero) {
      caseHero.classList.add("hero");
      caseHero.innerText = "Hero";
    }
  }

  if (monstre.pv > 0) {
    let caseMonstre = document.getElementById(`case-${monstre.x}-${monstre.y}`);
    if (caseMonstre) {
      caseMonstre.classList.add("monstre");
      caseMonstre.innerText = "Monstre";
    }
  }
}

window.addEventListener("keydown", function (event) {
  if (hero.pv <= 0) return;

  let touche = event.key.toLocaleLowerCase();
  let ancienX = hero.x;
  let ancienY = hero.y;

  if (touche === "z" && hero.y > 0) hero.y--; // haut
  if (touche === "s" && hero.y < 9) hero.y++; // bas
  if (touche === "q" && hero.x > 0) hero.x--; // gauche
  if (touche === "d" && hero.x < 9) hero.x++; // droit

  if (hero.x !== ancienX || hero.y !== ancienY) {
    consoleLog.innerText = `[Mouvement] ${hero.nom} se déplace en [${hero.x}, ${hero.y}]`;
    miseAJourDuPlateau();
  }
});

document.getElementById("plateau").addEventListener("click", function (event) {
  if (event.target.classList.contains("monstre")) {
    if (hero.pv <= 0 || monstre.pv <= 0) return;

    let distance = Math.abs(hero.x - monstre.x) + Math.abs(hero.y - monstre.y);

    if (distance <= 1) {
      monstre.pv -= hero.force;
      if (monstre.pv < 0) monstre.pv = 0;
      document.getElementById("monstre-pv").innerText = monstre.pv;
      consoleLog.innerText = `[Attaque] Vous infligez ${hero.force} dégâts au monstre`;

      if (monstre.pv > 0) {
        hero.pv -= monstre.force;
        if (hero.pv < 0) hero.pv = 0;
        document.getElementById("hero-pv").innerText = hero.pv;
        consoleLog.innerText += `\n[Riposte] Le monstre vous inflige ${monstre.force} dégâts !`;
      } else {
        consoleLog.innerText += `\n[Victoire] Le monstre est mort !`;
      }
    } else {
      consoleLog.innerText = `[Info] Trop loin pour attaquer ! Rapprochez-vous du monstre rouge.`;
    }
    miseAJourDuPlateau();
  }
});

miseAJourDuPlateau();
