<?php

include "oc_listes.php";

// ----------------------------------------------------------------------------

class TListeCouleur extends TListePourSerieHisto{
var $couleur;
var $legende;

function init($coul, $leg, $valeurs) {
parent::init($valeurs);
$this->couleur = $coul;
$this->legende = $leg;
}
}

// ---------------------------------------------------------------------------

class THistogramme extends TListePourHistogramme{
var $prefixe;

function Histogramme() { // constructeur
$this->prefixe = "";
}

function creercouches() {
$n = count($this->liste); // nombre de "ListeSimpleCouleur"
$this->TailleStatBloc = $this->epaisseur +($this->h_decalage)*($n-1) +$this->espace;

echo "<style type=text/css>\n";

for ($i=0; $i<$n; $i++) {
$this->liste[$i]->calc_haut_droite($i);

$m = count($this->liste[$i]->liste);

for ($j=0; $j<$m; $j++) {
echo 'couches' .$this->prefixe .$i .'x' .$j
.'{position: absolute; left:' . $this->liste[$i]->droite[$j] .'px; '
.'top:' . $this->liste[$i]->haut[$j] .'px; z-index=' . ($n-1-$i) .'; }'."\n";
}

echo "\n".'axe' .$this->prefixe .$i
.'{position: absolute; left:' . $this->liste[$i]->droite[0] .'px; '
.'top:' . $this->liste[$i]->phaut . 'px; z-index=' . ($n-1-$i) .'; }'."\n\n";
}

echo "</style>\n";
}

function dessiner() {
for ($i=count($this->liste)-1; $i>=0; $i--) {
$m = count($this->liste[$i]->liste);

echo "\n".'<div id=axe' . $this->prefixe . $i .'>';
echo '<img src="' . $this->liste[$i]->couleur
. '" width=' . ($this->liste[$i]->droite[$m-1] -$this->liste[$i]->droite[0] + $this->epaisseur)
. 'px height=1px border=0 vspace=0 hspace=0>';
echo "</div>\n\n";

for ($j=0; $j<$m; $j++) {
echo '<div id=couches' .$this->prefixe .$i .'x' .$j .'>';
echo '<img src="' .$this->liste[$i]->couleur . '" width=' .$this->epaisseur
. 'px height=' . $this->liste[$i]->taille[$j] . 'px alt="(' . $this->liste[$i]->legende . ') '
. $this->liste[$i]->liste[$j] . '" border=0 vspace=0 hspace=0>';
echo "</div>\n";
}
}
}

function creercoucheslegende() {
$n = count($this->liste); // nombre de "ListeSimpleCouleur"

echo "<style type=text/css>\n";

for ($i=0; $i<$n; $i++) {
$m = count($this->liste[$i]->liste);
$topi = $this->top +4 +$this->hauteur_pixels +$i*16 + $n*$this->v_decalage;

for ($j=0; $j<$m; $j++) {
echo 'valeurs' .$this->prefixe . $i . 'x' . $j
. '{position: absolute; left:' . ($this->left +$j*$this->TailleStatBloc) . 'px; top:' . $topi
. 'px; font-family:arial, helvetica; font-face:arial; font-size: 8pt; }' . "\n";
}
}

echo "</style>\n";
}

function dessinerlegende() {
for ($i=count($this->liste)-1; $i>=0; $i--) {
$m = count($this->liste[$i]->liste);

for ($j=0; $j<$m; $j++) {
echo '<div id=valeurs' .$this->prefixe .$i .'x' .$j .'>';
echo $this->liste[$i]->liste[$j] ;
echo "</div>\n";
}
}
}

function run($legende=false) {
$this->calculerhauteurmax();
$this->creercouches();

if ($legende==true) $this->creercoucheslegende();

$this->dessiner();

if ($legende==true) $this->dessinerlegende();
}
}

// ---------------------------------------------------------------------------

?> 