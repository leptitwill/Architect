		<section class="content-admin">

			<h1 class="titre"><?= $titre ?><br><span>Pour modifier le contenu cliquez sur les paragraphes</span></h1>

			<div style="background: white">

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

				<form onsubmit= "majAccueil('introduction')">
					<section id="introduction" class="accueil_introduction tiny-inline">
						
						<?= $accueil[0]['introduction'] ?>

					</section>
					<button hidden="hidden" name="submitbtn"></button>
				</form>

				<section class="accueil_produits">

					<?php foreach ($produits as $produit): ?>

						<article class="accueil_produit">

							<div class="accueil_produit_contenu">
								<div class="accueil_produit_photo" style="background-image: url('<?=img_url()?>produit/<?= $produit['couverture'] ?>')"></div>
								<div class="accueil_produit_info">
									<h3 class="accueil_produit_nom"><?= $produit['nom'] ?></h3>
									<div class="accueil_produit_description"><?= $produit['description'] ?></div>	
								</div>
							</div>
							<div class="accueil_produit_atout">
								<div class="atout">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24">
			 								<path d="M22,6.9v6.3c0,0-1.3,0.3-1.6,0.3c-0.3,0-1.1,0.3-1.7-0.3c-0.9-0.9-4.3-4.4-4.3-4.4S13.9,8.2,13,8.7l-1.5,0.9 C11,9.9,10.2,9.7,9.9,9.2l0,0c-0.4-0.6-0.2-1.4,0.4-1.7c1.2-0.7,3.1-1.8,3.8-2.2c0.6-0.4,1.1-0.4,2,0.4c1.1,0.9,2,1.8,2,1.8 s0.4,0.2,0.8,0.2C19.6,7.5,22,6.9,22,6.9z M9.9,17.8c-0.3-0.3-3.7-4-4-4.3c-0.4-0.5-1.1-0.4-1.7,0c-0.6,0.5-0.8,1.4-0.4,1.9 c0.4,0.5,3.5,3.8,4,4.3c0.4,0.5,1.5,0.3,2-0.2C10.3,19,10.4,18.2,9.9,17.8z M17.6,15.7c0.5-0.5,0.4-1.4-0.1-1.9 c-2.7-2.8-1.7-1.7-3.5-3.6c0,0-0.6-0.7-1.3-0.3c-0.2,0.1-0.5,0.3-0.9,0.5c-0.9,0.6-1.9,0.5-2.8-0.9C8,8.3,8.5,7.3,9.4,6.7l1.7-1.1 c0,0-0.4-0.6-1.6-0.6C8.3,5,5.8,6.8,5.8,6.8S5,7.3,4,6.9L2,6.2v7.2c0,0,0.6,0.2,1.1,0.4c0.1-0.3,0.3-0.7,0.6-0.9 c0.8-0.8,2.3-0.9,3,0c0.5,0.5,3.7,4,4,4.3c0.5,0.5,0.6,1.2,0.5,1.8C11.4,19.2,15.7,17.8,17.6,15.7z"></path>
										</svg>
										<p>fhbvhfb unrngvugbnv un urgnu bn bgub tub </p>	
									</div>
								</div>
								<div class="atout">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24">
			 								<path d="M22,6.9v6.3c0,0-1.3,0.3-1.6,0.3c-0.3,0-1.1,0.3-1.7-0.3c-0.9-0.9-4.3-4.4-4.3-4.4S13.9,8.2,13,8.7l-1.5,0.9 C11,9.9,10.2,9.7,9.9,9.2l0,0c-0.4-0.6-0.2-1.4,0.4-1.7c1.2-0.7,3.1-1.8,3.8-2.2c0.6-0.4,1.1-0.4,2,0.4c1.1,0.9,2,1.8,2,1.8 s0.4,0.2,0.8,0.2C19.6,7.5,22,6.9,22,6.9z M9.9,17.8c-0.3-0.3-3.7-4-4-4.3c-0.4-0.5-1.1-0.4-1.7,0c-0.6,0.5-0.8,1.4-0.4,1.9 c0.4,0.5,3.5,3.8,4,4.3c0.4,0.5,1.5,0.3,2-0.2C10.3,19,10.4,18.2,9.9,17.8z M17.6,15.7c0.5-0.5,0.4-1.4-0.1-1.9 c-2.7-2.8-1.7-1.7-3.5-3.6c0,0-0.6-0.7-1.3-0.3c-0.2,0.1-0.5,0.3-0.9,0.5c-0.9,0.6-1.9,0.5-2.8-0.9C8,8.3,8.5,7.3,9.4,6.7l1.7-1.1 c0,0-0.4-0.6-1.6-0.6C8.3,5,5.8,6.8,5.8,6.8S5,7.3,4,6.9L2,6.2v7.2c0,0,0.6,0.2,1.1,0.4c0.1-0.3,0.3-0.7,0.6-0.9 c0.8-0.8,2.3-0.9,3,0c0.5,0.5,3.7,4,4,4.3c0.5,0.5,0.6,1.2,0.5,1.8C11.4,19.2,15.7,17.8,17.6,15.7z"></path>
										</svg>
										<p>fhbvhfb unrngvugbnv un urgnu bn bgub tub </p>	
									</div>
								</div>
								<div class="atout">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24">
			 								<path d="M22,6.9v6.3c0,0-1.3,0.3-1.6,0.3c-0.3,0-1.1,0.3-1.7-0.3c-0.9-0.9-4.3-4.4-4.3-4.4S13.9,8.2,13,8.7l-1.5,0.9 C11,9.9,10.2,9.7,9.9,9.2l0,0c-0.4-0.6-0.2-1.4,0.4-1.7c1.2-0.7,3.1-1.8,3.8-2.2c0.6-0.4,1.1-0.4,2,0.4c1.1,0.9,2,1.8,2,1.8 s0.4,0.2,0.8,0.2C19.6,7.5,22,6.9,22,6.9z M9.9,17.8c-0.3-0.3-3.7-4-4-4.3c-0.4-0.5-1.1-0.4-1.7,0c-0.6,0.5-0.8,1.4-0.4,1.9 c0.4,0.5,3.5,3.8,4,4.3c0.4,0.5,1.5,0.3,2-0.2C10.3,19,10.4,18.2,9.9,17.8z M17.6,15.7c0.5-0.5,0.4-1.4-0.1-1.9 c-2.7-2.8-1.7-1.7-3.5-3.6c0,0-0.6-0.7-1.3-0.3c-0.2,0.1-0.5,0.3-0.9,0.5c-0.9,0.6-1.9,0.5-2.8-0.9C8,8.3,8.5,7.3,9.4,6.7l1.7-1.1 c0,0-0.4-0.6-1.6-0.6C8.3,5,5.8,6.8,5.8,6.8S5,7.3,4,6.9L2,6.2v7.2c0,0,0.6,0.2,1.1,0.4c0.1-0.3,0.3-0.7,0.6-0.9 c0.8-0.8,2.3-0.9,3,0c0.5,0.5,3.7,4,4,4.3c0.5,0.5,0.6,1.2,0.5,1.8C11.4,19.2,15.7,17.8,17.6,15.7z"></path>
										</svg>
										<p>fhbvhfb unrngvugbnv un urgnu bn bgub tub </p>	
									</div>
								</div>
								<div class="atout">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24">
			 								<path d="M22,6.9v6.3c0,0-1.3,0.3-1.6,0.3c-0.3,0-1.1,0.3-1.7-0.3c-0.9-0.9-4.3-4.4-4.3-4.4S13.9,8.2,13,8.7l-1.5,0.9 C11,9.9,10.2,9.7,9.9,9.2l0,0c-0.4-0.6-0.2-1.4,0.4-1.7c1.2-0.7,3.1-1.8,3.8-2.2c0.6-0.4,1.1-0.4,2,0.4c1.1,0.9,2,1.8,2,1.8 s0.4,0.2,0.8,0.2C19.6,7.5,22,6.9,22,6.9z M9.9,17.8c-0.3-0.3-3.7-4-4-4.3c-0.4-0.5-1.1-0.4-1.7,0c-0.6,0.5-0.8,1.4-0.4,1.9 c0.4,0.5,3.5,3.8,4,4.3c0.4,0.5,1.5,0.3,2-0.2C10.3,19,10.4,18.2,9.9,17.8z M17.6,15.7c0.5-0.5,0.4-1.4-0.1-1.9 c-2.7-2.8-1.7-1.7-3.5-3.6c0,0-0.6-0.7-1.3-0.3c-0.2,0.1-0.5,0.3-0.9,0.5c-0.9,0.6-1.9,0.5-2.8-0.9C8,8.3,8.5,7.3,9.4,6.7l1.7-1.1 c0,0-0.4-0.6-1.6-0.6C8.3,5,5.8,6.8,5.8,6.8S5,7.3,4,6.9L2,6.2v7.2c0,0,0.6,0.2,1.1,0.4c0.1-0.3,0.3-0.7,0.6-0.9 c0.8-0.8,2.3-0.9,3,0c0.5,0.5,3.7,4,4,4.3c0.5,0.5,0.6,1.2,0.5,1.8C11.4,19.2,15.7,17.8,17.6,15.7z"></path>
										</svg>
										<p>fhbvhfb unrngvugbnv un urgnu bn bgub tub </p>	
									</div>
								</div>
							</div>

						</article>
					
					<?php endforeach; ?>

				</section>

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

			</div>

		</section>