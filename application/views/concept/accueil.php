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

				<ul>
					<li>
						<img src="<?=img_url()?>concept/1.svg" alt="" >
						<h3>titre</h3>
						<p>cdbhb v brg btgy byt b</p>
					</li>
					<li>
						<img src="<?=img_url()?>concept/1.svg" alt="" >
						<h3>titre</h3>
						<p>cdbhb v brg btgy byt b</p>
					</li>
					<li>
						<img src="<?=img_url()?>concept/1.svg" alt="" >
						<h3>titre</h3>
						<p>cdbhb v brg btgy byt b</p>
					</li>
					<li>
						<img src="<?=img_url()?>concept/1.svg" alt="" >
						<h3>titre</h3>
						<p>cdbhb v brg btgy byt b</p>
					</li>
					<li>
						<img src="<?=img_url()?>concept/1.svg" alt="" >
						<h3>titre</h3>
						<p>cdbhb v brg btgy byt b</p>
					</li>
					<li>
						<img src="<?=img_url()?>concept/1.svg" alt="" >
						<h3>titre</h3>
						<p>cdbhb v brg btgy byt b</p>
					</li>
				</ul>

			</section>

			<section class="concept_membres">

				<div class="content">

					<h2>Notre équipe</h2>

					<?php foreach ($membres as $membre): ?>

						<div class="concept_membre">
							<div class="concept_membre_photo" style="background-image: url('<?=img_url()?>membre/<?= $membre['photo']; ?>');"></div>
							<div class="concept_membre_info">
								<p class="concept_membre_nom"><?= $membre['prenom'] . ' ' . $membre['nom']; ?></p>
								<p class="concept_membre_role"><?= $membre['role'] ?></p>
							</div>
						</div>

					<?php endforeach; ?>
				</div>

			</section>

			<section class="concept_membres">

				<div class="content">

					<h2>COMMENT NOS CUBS SONT RÉALISÉS ET INSTALLÉS ?</h2>

					<?php foreach ($membres as $membre): ?>

						<div class="concept_membre">
							<div class="concept_membre_photo" style="background-image: url('<?=img_url()?>membre/<?= $membre['photo']; ?>');"></div>
							<div class="concept_membre_info">
								<p class="concept_membre_nom"><?= $membre['prenom'] . ' ' . $membre['nom']; ?></p>
								<p class="concept_membre_role"><?= $membre['role'] ?></p>
							</div>
						</div>

					<?php endforeach; ?>
				</div>

			</section>

		</section>
