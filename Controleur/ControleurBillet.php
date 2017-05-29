<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

class ControleurBillet extends Controleur {

  private $billet;
  private $commentaire;

  public function __construct() {
    $this->billet = new Billet();
    $this->commentaire = new Commentaire();
  }

  // Affiche les détails sur un billet
  public function index() {
    $idBillet = $this->requete->getParametre("id");
        
    $billet = $this->billet->getBillet($idBillet);
    $commentaires = $this->commentaire->getCommentaires($idBillet);
        
    $this->genererVue(array('billet' => $billet, 
      'commentaires' => $commentaires));
  }

  public function test() {

   $lesCommentaire = $this->commentaire->lesCommentaire();
   $this->genererVue(array('lesCommentaire' => $lesCommentaire));
  }

  // Ajoute un commentaire sur un billet
  public function commenter() {
    $idBillet = $this->requete->getParametre("id");
    $auteur = $this->requete->getParametre("auteur");
    $contenu = $this->requete->getParametre("contenu");
        
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        
    // Exécution de l'action par défaut pour actualiser la liste des billets
    $this->executerAction("index");
  }
}