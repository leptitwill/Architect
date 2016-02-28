		<section class="content">

			<h1 class="titre"><?= $titre ?></h1>

			<?php foreach ($membres as $membre): ?>

				<article class="membre">

					<img class="membre_photo" src="<?=img_url()?>membre/<?= $membre['photo']; ?>">
					<div class="membre_info">
						<p class="membre_nom"><?= $membre['prenom'] . ' ' . $membre['nom']; ?></p>
						<p class="membre_role"><?= $membre['role'] ?></p>
						<p class="membre_description"><?= $membre['description'] ?></p>	
					</div>

				</article>
			
			<?php endforeach; ?>

		</section>