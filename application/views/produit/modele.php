		<section class="cover" style="background-image: url('<?=img_url()?>produit/<?=$produit[0]['couverture']?>')">
			<div class="overlay">
				<div class="cover_titre">
					<h1><?= $produit[0]['titre'] ?></h1>
					<h3><?= $produit[0]['sousTitre'] ?></h3>
				</div>
			</div>
		</section>

		<section class="content">

			<section class="produit_introduction">
				<?= $produit[0]['description'] ?>
			</section>

			<?php foreach ($gammes as $gamme): $gamme_url = $gamme['url']; ?>	
				
				<a href="<?= base_url("gamme/$gamme_url") ?>" class="gamme_nom">
					<article class="produit_gamme" style="background-image: url('<?=img_url()?>gamme/<?= $gamme['miniature'] ?>')">
						<span><?= $gamme['nom'] ?></span>
					</article>
				</a>

			<?php endforeach ?>

			<?php foreach ($avantages as $avantage): ?>	

			<img src="<?= $avantage['icone'] ?>">

				<span><?= $avantage['nom'] ?></span>
				<span><?= $avantage['description'] ?></span>

			<?php endforeach ?>

		</section>