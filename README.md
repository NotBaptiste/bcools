# bcools.me

Portfolio personnel de Baptiste Cools. Site statique, sans build ni dépendance :
les fichiers du dépôt sont servis tels quels.

## Déploiement

Automatique. Un push sur `main` déclenche un webhook GitHub qui demande à
l'hébergement OVH de récupérer le dépôt. Compter quelques secondes.

Aucun accès FTP n'est nécessaire, et **aucun identifiant ne doit jamais entrer
dans ce dépôt, qui est public**.

## Pages

| Adresse | Rôle |
|---|---|
| `index.html` | À propos — page d'accueil |
| `projets.html` | Les projets, un par carte, chacun avec sa couleur |
| `cv.html` | Parcours, compétences et téléchargement du CV |
| `contact.html` | Contact par e-mail |
| `404.html` | Page d'erreur, branchée dans le `.htaccess` |

## Identité visuelle

Reprise du site de 2017, dont les couleurs ont été conservées.

| Rôle | Valeur |
|---|---|
| Accent, liens | `#56c8d4` |
| Structure, barre latérale | `#2f3e4f` |
| Texte | `#333` |
| Fond | `#f3f2f2` |

Chaque projet porte sa propre couleur, déclarée en variable sur sa carte :

| Projet | Couleur |
|---|---|
| Baptiste Cools | `#2493f2` |
| Pose ta Clope | `#63b879` |
| Club des Dryers | `#04a59f` |
| Petit Gille | `#f9ae3b` |
| Le Chti Belge | `#ef5055` |

Polices : **Poppins** pour les titres, **Hind** pour le texte, chargées depuis
Google Fonts.

## Structure

Une seule feuille de style, `assets/css/style.css`, construite sur des variables
CSS. Pas de framework, pas de JavaScript, icônes en SVG inline.

Pour ajouter un projet : copier un bloc `<article class="projet">` dans
`projets.html` et lui donner sa couleur via `style="--teinte: #xxxxxx"`.

## Mettre le CV en ligne

Déposer le PDF à la racine sous le nom `cv-baptiste-cools.pdf`, puis remplacer
dans `cv.html` le bloc `bouton--sourd` par :

```html
<a class="bouton" href="cv-baptiste-cools.pdf" download>
  <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 16l-6-6h4V3h4v7h4l-6 6zm-8 2h16v3H4v-3z"/></svg>
  Télécharger mon CV
</a>
```

## Documentation

Le contexte, l'architecture et le journal du projet vivent dans le vault Cleo,
sous `boulot/projets/bcools/`.
