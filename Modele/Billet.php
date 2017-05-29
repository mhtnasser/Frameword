<?php

require_once 'Framework/Modele.php';

class Billet extends Modele {

  // Renvoie la liste des billets du blog
  public function getBillets() {
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' order by BIL_ID desc';
    $billets = $this->executerRequete($sql);
    return $billets->fetchAll(PDO::FETCH_ASSOC);
  }

  // Renvoie les informations sur un billet
  public function getBillet($idBillet) {
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' where BIL_ID=?';
    $billet = $this->executerRequete($sql, array($idBillet));
    if ($billet->rowCount() == 1)
      return $billet->fetch(PDO::FETCH_ASSOC);  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
}