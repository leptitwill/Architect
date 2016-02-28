		<section class="content">

			<h1 class="titre"><?= $titre ?></h1>

			<?php foreach ($membres as $membre): ?>
				
				<?php
					$membre_id = $membre['idMembre'];
				?>

				<article class="membre">

					<div class="modifier_membre">
						<a href="<?= base_url("membre/modifier/$membre_id"); ?>" id="<?= $membre['idMembre'] ?>">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
								<path fill="#E57373" d="M42.583,9.067l-3.651-3.65c-0.555-0.556-1.459-0.556-2.015,0l-1.718,1.72l5.664,5.664l1.72-1.718C43.139,10.526,43.139,9.625,42.583,9.067"></path>
								<rect x="4.465" y="21.524" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 56.4088 27.6943)" fill="#FF9800" width="36.007" height="8.011"></rect>
								<rect x="34.61" y="7.379" transform="matrix(0.7069 -0.7074 0.7074 0.7069 2.679 29.236)" fill="#B0BEC5" width="4.006" height="8.013"></rect>
								<polygon fill="#FFC107" points="6.905,35.43 5,43 12.571,41.094 "></polygon>
								<polygon fill="#37474F" points="5.965,39.172 5,43 8.827,42.035 "></polygon>
							</svg>
						</a>
					</div>

					<img class="membre_photo" src="<?=img_url()?>membre/<?= $membre['photo']; ?>">
					<div class="membre_info">
						<p class="membre_nom"><?= $membre['prenom'] . ' ' . $membre['nom']; ?></p>
						<p class="membre_role"><?= $membre['role'] ?></p>
						<p class="membre_description"><?= $membre['description'] ?></p>	
					</div>

				</article>
			
			<?php endforeach; ?>

		</section>