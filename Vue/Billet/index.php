<?php $this->titre = "Mon Blog - " . $this->nettoyeur($billet['titre']); ?>

<article>
  <header>
    <h1 class="titreBillet"><?= $this->nettoyeur($billet['titre']) ?></h1>
    <time><?= $this->nettoyeur($billet['date']) ?></time>
  </header>
  <p><?= $this->nettoyeur($billet['contenu']) ?></p>
</article>
<hr />
<header>
  <h1 id="titreReponses">Réponses à <?= $this->nettoyeur($billet['titre']) ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
  <p><?= $this->nettoyeur($commentaire['auteur']) ?> dit :</p>
  <p><?= $this->nettoyeur($commentaire['contenu']) ?></p>
<?php endforeach; ?>

<form method="post" action="billet/commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>

