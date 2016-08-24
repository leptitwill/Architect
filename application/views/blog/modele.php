<div class="container_article">
	<section class="article_sidebar">
		<?php foreach ($sb_articles as $sb_article): ?>

			<?php
			if ($sb_article['url'] ==  $article[0]['url'])
			{

			} else { ?>
				<div class="article">
					<a href="<?= base_url('blog').'/'.$sb_article['url'] ?>">
						<div class="article_photo" style="background-image: url('<?=img_url()?>blog/<?= $sb_article['couverture'] ?>');"></div>
					</a>
					<h3 class="article_titre"><?= $sb_article['nom'] ?></h3>
					<span class="article_info"><?= $sb_article['auteur'] . ', le ' . $sb_article['date'] ?></span>
					<p class="article_description"><?= $sb_article['contenu'] ?></p>
				</div>
			<?php } ?>

		<?php endforeach; ?>
	</section>

	<section class="cover cover-article" style="background-image: url('<?=img_url()?>blog/<?= $article[0]['couverture']?>')">

		<div class="overlay">
			<div class="cover_titre">
				<h1><?= $article[0]['nom'] ?></h1>
				<h3><?= $article[0]['auteur'] . ', le ' . $article[0]['date'] ?></h3>
			</div>
		</div>

	</section>

	<section class="content">

		<div class="article_contenu">
			<p class="article_description"><?= nl2br($article[0]['contenu']) ?></p>
		</div>

	</section>
	<div class="clear"></div>
</div>
