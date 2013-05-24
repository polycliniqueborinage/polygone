<?php
// -----------------------------------------------
// Classe de base pour g�rer des listes ind�finies
// -----------------------------------------------

class TListeSimple { // classe de base permettant de g�rer
var $liste = array(); // un tableau de valeurs

function clear() {
array_splice($this->liste, // remplacer dans $this->liste
0, // � partir de l'indice 0
count($this->liste)); // tous les �l�ments ... par rien
}

function init($valeurs) {
$this->clear();

foreach($valeurs as $valeur)
$this->liste[] = $valeur;
}

function add($valeur) {
$this->liste[] = $valeur;
}

function insert($i, $valeur) {
array_splice($this->liste, // remplacer dans $this->liste
$i, // � partir de l'indice $i
0, // les O (!) �l�ments
array($valeur)); // par le tableau d'un �l�ment [ $valeur ]
}

function delete($i) {
array_splice($this->liste, // remplacer dans $this->liste
$i, // � partir de l'indice $i
1); // un �l�ment ... par rien
}
}

// --------------------------------------------------
// Classe g�rant une s�rie de points d'un histogramme
// (un histogramme = 1 ou plusieurs s�ries de points)
// --------------------------------------------------

class TListePourSerieHisto extends TListeSimple{

//private // On n'a pas � g�rer ces champs, c'est la classe qui s'en charge

var $histo; // Chaque s�rie est rattach�e � un histogramme dont il d�pend pour la position...
var $phaut; // Coordonn�e y du point z�ro
var $haut;
var $droite;
var $taille;

// protected // Cette fonction doit pouvoir �tre utilis� par les classes qui en d�rive

function calc_haut_droite($i) {
$H = $this->histo; // "raccourci"
$n = count($H->liste); // nombre de niveaux de l'histogramme
$rapport = $H->hauteur_pixels / $H->hauteur_reelle;

$this->phaut = round($H->top +$H->vmax*$rapport +$H->v_decalage*($n -1 -$i));

$m = count($this->liste);

for ($j=0; $j<$m; $j++) {
$this->droite[$j] = $H->left +$j*$H->TailleStatBloc +$i*$H->h_decalage;
$this->taille[$j] = round(abs($this->liste[$j])*$rapport);

if ($this->liste[$j]>=0)
$this->haut[$j] = $this->phaut - $this->taille[$j];
else
$this->haut[$j] = $this->phaut;
}
}
}

// ---------------------------------------
// Classe pour g�rer une s�rie de s�ries !
// ---------------------------------------

class TListePourHistogramme extends TListeSimple{
var $top;
var $left;
var $hauteur_pixels; // hauteur en pixel de la plus grande valeur de l'histogramme
var $epaisseur; // epaisseur d'une barre de l'histogramme
var $h_decalage; // d�calage horizontal en pixels entre le graphe n et le graphe n-1
var $v_decalage; // d�calage vertical en pixels entre le graphe n et le graphe n-1
var $espace;
var $prefixe;
var $hauteur_reelle;
var $TailleStatBloc;
var $vmin;
var $vmax;
var $nbpointsmax;

function add(&$valeur) {
$valeur->histo = &$this;
$this->liste[] = &$valeur;
}

function insert($i, &$valeur) {
$valeur->histo = &$this;
array_splice($this->liste, // remplacer dans $this->liste
$i, // � partir de l'indice $i
0, // les O (!) �l�ments
array(&$valeur)); // par le tableau d'un �l�ment [ $valeur ]
}

function calculerhauteurmax () {
$this->nbpointsmax = 0;
$this->vmin = $this->liste[0]->liste[0];
$this->vmax = $this->vmin;
$n = count($this->liste); // nombre de "ListeSimpleCouleur"

for ($i=0; $i<$n; $i++) {
$m = count($this->liste[$i]->liste);
$this->nbpointsmax = max($this->nbpointsmax, $m);

for ($j=0; $j<$m; $j++) {
if ($this->vmin>$this->liste[$i]->liste[$j]) $this->vmin = $this->liste[$i]->liste[$j];
if ($this->vmax<$this->liste[$i]->liste[$j]) $this->vmax = $this->liste[$i]->liste[$j];
}
}

if (($this->vmin<0) and ($this->vmax>0)) {
$this->hauteur_reelle = $this->vmax - $this->vmin;
}
elseif ($this->vmin<0) {
$this->vmax = 0;
$this->hauteur_reelle = -$this->vmin;
}
else {
$this->vmin = 0;
$this->hauteur_reelle = $this->vmax;
}
}
}

// ---------------------------------------------------------------------------

?>

