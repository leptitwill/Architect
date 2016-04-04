		<section class="cover" style="background-image: url('<?=img_url()?>gamme/<?=$gamme[0]['couverture']?>')"></section>

		<section class="content">

			<h1 class="titre"><?= $gamme[0]['nom'] ?></h1>

			<p class="description">
				<?= $gamme[0]['description'] ?> 
			</p>

			<article class="gamme">

				<img class="gamme_photo" src="<?=img_url()?>gamme/<?= $gamme['miniature']; ?>">
				<div class="gamme_info">
					<p class="gamme_nom"><?= $gamme['nom'] ?></p>
					<p class="gamme_role"><?= $gamme['url'] ?></p>
					<p class="gamme_description"><?= $gamme['description'] ?></p>	
				</div>

			</article>

		</section>