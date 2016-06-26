		<section class="cover" style="background-image: url('<?=img_url()?>concept/cover.jpg')">

			<div class="overlay">
				<div class="cover_titre">
					<h1><?= $titre ?></h1>
					<h3><?= $sous_titre ?></h3>
				</div>
			</div>

		</section>

		<section class="content">

			<section class="concept_introduction">

				<p><?= nl2br($concept[0]['introduction']) ?></p>

			</section>

			<section class="concept_membres">

				<?php foreach ($membres as $membre): ?>
				
					<div class="concept_membre">
						<div class="concept_membre_photo" style="background-image: url('<?=img_url()?>membre/<?= $membre['photo']; ?>');"></div>
						<div class="concept_membre_info">
							<p class="concept_membre_nom"><?= $membre['prenom'] . ' ' . $membre['nom']; ?></p>
							<p class="concept_membre_role"><?= $membre['role'] ?></p>
							<p class="concept_membre_description"><?= $membre['description'] ?></p>
						</div>
					</div>

				<?php endforeach; ?>

			</section>

		</section>

		