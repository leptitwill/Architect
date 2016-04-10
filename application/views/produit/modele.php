		<section class="cover" style="background-image: url('<?=img_url()?>produit/<?=$produit[0]['couverture']?>')"></section>

		<section class="content">

			<h1 class="titre"><?= $produit[0]['nom'] ?></h1>

			<p class="description">
				<?= $produit[0]['description'] ?> 
			</p>

			<?php foreach ($gammes as $gamme): $gamme_url = $gamme['url']; ?>	
				
				<a href="<?= base_url("gamme/$gamme_url") ?>" class="gamme_nom">
					<article class="produit_gamme" style="background-image: url('<?=img_url()?>gamme/<?= $gamme['miniature'] ?>')">
						<span><?= $gamme['nom'] ?></span>
					</article>
				</a>

			<?php endforeach ?>

		</section>