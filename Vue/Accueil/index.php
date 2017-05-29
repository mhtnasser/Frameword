<?php $this->titre = "MonBlog"; ?>

<?php foreach ($billets as $billet): ?>
  <article>
    <header>
      <a href="<?= "billet/index/" . $this->nettoyeur($billet['id']) ?>">
        <h1 class="titreBillet"><?= $this->nettoyeur($billet['titre']) ?></h1>
      </a>
      <time><?= $this->nettoyeur($billet['date']) ?></time>
    </header>
      <p><?= $this->nettoyeur($billet['contenu']) ?></p>
  </article>
  <hr />
<?php endforeach; ?>

