 <?php

 include "oc_listes.php";

 // ----------------------------------------------------------------------------

 class TGDListeCouleur extends TListePourSerieHisto{
 var $couleur;
 var $couleur2;
 var $R;
 var $V;
 var $B;
 var $legende;

 function init($R, $V, $B, $leg, $valeurs) {
 parent::init($valeurs);
 $this->R = $R;
 $this->V = $V;
 $this->B = $B;
 $this->legende = $leg;
 }
 }

 // ---------------------------------
 // Trouver une couleur intermédiaire
 // ---------------------------------

 function NoircirCouleur($r, $g, $b, $r2, $g2, $b2, &$r3, &$g3, &$b3) {
 $rStep = ($r2 - $r) / 3; // note: 3, 4, 5... => plus clair, 2 => plus sombre
 $gStep = ($g2 - $g) / 3;
 $bStep = ($b2 - $b) / 3;

 $r3 = round($r +$rStep);
 $g3 = round($g +$gStep);
 $b3 = round($b +$bStep);
 }

 // ---------------------------------------
 // Fonction dessinant une barre (3D ou 2D)
 // ---------------------------------------

 function barre3D($im,
 $dh, $dv, // paramètres de perspective de la barre
 $x1, $y1, // coin gauche supérieur (hors perspective)
 $h, $v, // h : largeur Horizontal, v : hauteur Vertical
 $coul, $coul2 // couleurs des autres faces la barre (en 3D)
 ) {
 $x2 = $x1+$h; $y2 = $y1;
 $x3 = $x2; $y3 = $y2+$v;
 $x4 = $x1; $y4 = $y3;

 ImageFilledRectangle($im, $x1, $y1, $x3, $y3, $coul);

 if (($dh!=0) and ($dv!=0)) {
 ImageFilledPolygon($im, array($x1, $y1, $x1+$dh, $y1-$dv, $x2+$dh, $y2-$dv, $x2, $y2 ), 4, $coul2);
 ImageFilledPolygon($im, array($x3, $y3, $x2, $y2 , $x2+$dh, $y2-$dv, $x3+$dh, $y3-$dv), 4, $coul2);
 }
 }

 // ---------------------------------------------------------------------------

 class TGDHistogramme extends TListePourHistogramme{
 // public

 var $h3;
 var $v3;

function nth_imagesreperes($espacement, $image)
{
 $gris = imagecolorallocate($image, 220, 220 ,220);
 $largeur_image = imagesx($image);
 $hauteur_image = imagesy($image);
	 
 for($repere_vertical = $espacement; $repere_vertical <= $largeur_image; $repere_vertical)
 {
	imageline($image, $repere_vertical, 0, $repere_vertical, $hauteur_image, $gris);
	imagestring($image, 3, $repere_vertical+5, 0, $repere_vertical, $gris);
	$repere_vertical = $repere_vertical+$espacement;
 }
 for($repere_horizontal = $espacement; $repere_horizontal <= $hauteur_image; $repere_horizontal)
 {
	imageline($image, 0, $repere_horizontal, $largeur_image, $repere_horizontal, $gris);
	imagestring($image, 3, 0, $repere_horizontal, $repere_horizontal, $gris);
	$repere_horizontal = $repere_horizontal+$espacement;
 }
}
 
 function dessiner($legende=false) {
 $n = count($this->liste); // nombre de "ListeSimpleCouleur"
 $this->TailleStatBloc = $this->epaisseur +($this->h_decalage)*($n-1) +$this->espace;

 $largeurimage = $this->left*2 // on rajoute autant d'espace à droite qu'à gauche
 + $this->TailleStatBloc*$this->nbpointsmax -$this->h_decalage;

 if ($this->h3!=0 and $this->v3!=0) $largeurimage += $this->h3;

 if ($legende)
 $hauteurimage = $this->top*2 +4 +$this->hauteur_pixels +$n*16 + $n*$this->v_decalage;
 else
 $hauteurimage = $this->top*2 + $this->hauteur_pixels +$this->v_decalage*($n-1);

 if ($this->h3!=0 and $this->v3!=0) $hauteurimage -= $this->v3;

 $im = ImageCreate($largeurimage, $hauteurimage) or die ("Erreur lors de la création de l'image");
 $couleur_fond = ImageColorAllocate($im, 255, 255, 255); // 1er couleur enregistré = couleur de fond
 $noir = ImageColorAllocate ($im, 0, 0, 0);


 for ($i=0; $i<$n; $i++) {
 $this->liste[$i]->calc_haut_droite($i);
 $this->liste[$i]->couleur = ImageColorAllocate($im, $this->liste[$i]->R, $this->liste[$i]->V, $this->liste[$i]->B);
 NoircirCouleur($this->liste[$i]->R, $this->liste[$i]->V, $this->liste[$i]->B, 0, 0, 0, $RN, $VN, $BN);
 $this->liste[$i]->couleur2 = ImageColorAllocate($im, $RN, $VN, $BN);
 }

 for ($i=count($this->liste)-1; $i>=0; $i--) {
 $m = count($this->liste[$i]->liste);

 if ($legende) $topi = $this->top +4 +$this->hauteur_pixels +$i*16 + $n*$this->v_decalage;

 imageline($im, // tracé des axes horizontaux
 $this->liste[$i]->droite[0],
 $this->liste[$i]->phaut,
 $this->liste[$i]->droite[$m-1] - $this->liste[$i]->droite[0] + $this->epaisseur,
 $this->liste[$i]->phaut,
 $this->liste[$i]->couleur);

 for ($j=0; $j<$m; $j++) {
 barre3D($im, $this->h3, $this->v3,
 $this->liste[$i]->droite[$j], // left
 $this->liste[$i]->haut[$j], // top
 $this->epaisseur, // width (largeur d'une barre)
 $this->liste[$i]->taille[$j], // height
 $this->liste[$i]->couleur,
 $this->liste[$i]->couleur2);

 if ($legende)
 ImageString($im, 2,
 $this->left +$j*$this->TailleStatBloc,
 $topi,
 $this->liste[$i]->liste[$j],
 $noir); //$this->liste[$i]->couleur);
 }
 }

 return $im;
 }

 function run($legende=false) {
 $this->calculerhauteurmax();
 return $this->dessiner($legende);
 }
 }

 // ---------------------------------------------------------------------------

 ?> 