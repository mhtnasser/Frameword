<?php

require_once 'Framework/Modele.php';

class Commentaire extends Modele {

  // Renvoie la liste des commentaires associés à un billet
  public function getCommentaires($idBillet) {
    $sql = 'select COM_ID as id, COM_DATE as date,'
      . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
      . ' where BIL_ID=?';
    $commentaires = $this->executerRequete($sql, array($idBillet));
    
    //var_dump($commentaires->rowCount()); die();
    if ($commentaires->rowCount() != 0)
    	return $commentaires->fetchAll(PDO::FETCH_ASSOC);
    else
    	return $commentaires = array();
    	//throw new exception('aucun commentiares pour le billet numero '.$idBillet);
  }

  // Ajoute un commentaire dans la base
  public function ajouterCommentaire($auteur, $contenu, $idBillet) {
    $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
      . ' values(?, ?, ?, ?)';

	$dates = new DateTime();
	$date = $dates->format('Y-m-d H:i:s'); // Récupère la date courante
    $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
  }

}