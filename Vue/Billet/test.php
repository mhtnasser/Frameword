<?php $this->titre = "Mon Blog - test "; ?>

<hr />
<?php //var_dump($lesCommentaire); die(); ?>
<?php foreach ($lesCommentaire as $commentaire): ?>
  <p><?= $this->nettoyeur($commentaire['COM_ID']) ?> dit :</p>
  <p><?= $this->nettoyeur($commentaire['COM_DATE']) ?></p>
  <p><?= $this->nettoyeur($commentaire['COM_AUTEUR']) ?> dit :</p>
  <p><?= $this->nettoyeur($commentaire['COM_CONTENU']) ?></p>
  <p><?= $this->nettoyeur($commentaire['BIL_ID']) ?></p>

<?php endforeach; ?>