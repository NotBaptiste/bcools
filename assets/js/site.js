// Seul JavaScript du site : l'année du copyright et le menu mobile.
// Chargé en différé, le site reste utilisable sans lui.
(function () {
  "use strict";

  var annee = document.getElementById("annee");
  if (annee) annee.textContent = new Date().getFullYear();

  var barre = document.querySelector(".barre");
  var bouton = document.querySelector(".burger");
  if (!barre || !bouton) return;

  function bascule(ouvrir) {
    barre.setAttribute("data-menu", ouvrir ? "ouvert" : "ferme");
    bouton.setAttribute("aria-expanded", String(ouvrir));
    document.body.style.overflow = ouvrir ? "hidden" : "";
  }

  bouton.addEventListener("click", function () {
    bascule(barre.getAttribute("data-menu") !== "ouvert");
  });

  // Choisir une page referme le panneau avant la navigation.
  barre.querySelectorAll(".nav a").forEach(function (lien) {
    lien.addEventListener("click", function () { bascule(false); });
  });

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") bascule(false);
  });
})();
