<section class="cover" style="background-image: url('<?=img_url()?>blog/cover.jpg')">

	<div class="overlay">
		<div class="cover_titre">
			<h1><?= $titre ?></h1>
			<h3><?= $sous_titre ?></h3>
		</div>
	</div>

</section>

<section class="content">

	<div class="articles">

		<?php foreach ($articles as $article): $date = strtotime($article['date']); $date = date( 'd-m-Y', $date );?>

			<div class="article">
				<a href="<?= base_url('blog').'/'.$article['url'] ?>">
					<div class="article_photo" style="background-image: url('<?=img_url()?>blog/<?= $article['couverture'] ?>');"></div>
				</a>
				<h3 class="article_titre"><?= $article['nom'] ?></h3>
				<span class="article_info"><?= $article['auteur'] . ', le ' . $date ?></span>
				<p class="article_description"><?= $article['contenu'] ?></p>
			</div>

		<?php endforeach; ?>

	</div>

</section>
