		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<section class="cover--home my-slider">
				<ul>
					<li class="cover--home" style="background-image: url('<?=img_url()?>cover-1.jpg')">
						<div class="cover_texte">
							<h3>Nos bureau de jardin</h3><br>
							<span>Super facile d'utilisation et trés beau.</span>
						</div>
					</li>
					<li class="cover--home" style="background-image: url('<?=img_url()?>cover-2.jpg')">
						<div class="cover_texte">
							<h3>Nos studio de jardin</h3><br>
							<span>Super facile d'utilisation et trés beau.</span>
						</div>
					</li>
					<li class="cover--home" style="background-image: url('<?=img_url()?>cover-3.jpg')">
						<div class="cover_texte">
							<h3>Voyager au Canada</h3><br>
							<span>Super facile d'utilisation et trés beau.</span>
						</div>
					</li>
				</ul>
			</section>

				<section class="accueil_introduction">
					
					<h1 class="titre"><?= $titre ?></h1>

					<p class="description">
						Conceptcub offre une réponse efficace aux vraies problématiques sociales avec l'évolution du home working et sociétales par la pénurie et le coût du logement pour les jeunes et les seniors
						 <br><br>
						Créateur de pièces à vivre offrant une seconde vie à des containers maritimes, Conceptcub complète votre offre de logement de façon temporaire ou définitive  par la création d' espaces à vivre aménagés et équipés dans votre jardin
					</p>

				</section>

				<section class="accueil_produits">

					<h2 class="titre">Les produits</h2>

					<?php foreach ($produits as $produit): ?>

					<?php $produit_url = $produit['url']; ?>

					<a href="<?= base_url("produit/$produit_url") ?>">

						<article class="accueil_produit">

							<div class="accueil_produit_photo" style="background-image: url('<?=img_url()?>produit/<?= $produit['couverture'] ?>')"></div>
							<div class="accueil_produit_info">
								<h3 class="accueil_produit_nom"><?= $produit['nom'] ?></h3>
								<div class="accueil_produit_description"><?= $produit['description'] ?></div>	
							</div>

						</article>

					</a>
				
				<?php endforeach; ?>

				<section class="accueil_membres">

					<h2 class="titre">Les membres</h2>

					<?php foreach ($membres as $membre): ?>
					
						<?php
							$membre_id = $membre['idMembre'];
						?>

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

			</section>	

		</section>