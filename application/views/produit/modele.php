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

				<p class="uptitle">Nous vous apportons</p>
				<h2>Des réponses pratiques</h2>

				<?= $produit[0]['description'] ?>

			</section>

			<section class="produit_avantages">

				<?php foreach ($avantages as $avantage): ?>	
					<div class="produit_avantage">
						<img src="<?=img_url()?>avantage/<?= $avantage['icone'] ?>">
						<p class="produit_avantage_nom"><?= $avantage['nom'] ?></p>
						<p class="produit_avantage_description"><?= $avantage['description'] ?></p>
					</div>
				<?php endforeach ?>	

			</section>

			<hr/>

			<section class="produit_solutions">

				<p class="uptitle">A qui s'adressent</p>
				<h2>Nos solutions</h2>

				<?php foreach ($solutions as $solution): ?>	
					<div class="produit_solution">
						<img src="<?=img_url()?>solution/<?= $solution['icone'] ?>">
						<p class="produit_solution_nom"><?= $solution['nom'] ?></p>
						<p class="produit_solution_description"><?= $solution['description'] ?></p>
					</div>
				<?php endforeach ?>	

			</section>

			<hr/>

			<section class="produit_gammes">

				<p class="uptitle">Jetez un coup d'oeil à</p>
				<h2>Nos <?= $produit[0]['nom'] ?></h2>
				
				<?php foreach ($gammes as $gamme): $gamme_url = $gamme['url']; ?>	
					<div class="produit_gamme">
						<div class="produit_gamme_photo" style="background-image: url('<?=img_url()?>gamme/<?= $gamme['miniature'] ?>')">
							<div class="overlay">
								<div class="produit_gamme_nom">
									<h3><?= $gamme['nom'] ?></h3>
								</div>
							</div>
						</div>

						<div class="produit_atout">
							<div class="atout">
								<div>
									<svg version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24">
										<path d="M20,20v-8h2v0L12,3L2,12v0h2v8c0,0.6,0.4,1,1,1h5v-7h4v7h5C19.6,21,20,20.6,20,20z"></path>
									</svg>
									<p>Le studio de jardin est garanti 10 ans</p>	
								</div>
							</div>
							<div class="atout">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24" enable-background="new 0 0 24 24">
									    <path d="M 6.09375 4 C 5.39375 4 4.80625 4.4 4.40625 5 L 2.1875 8.59375 C 2.0875 8.79375 2 9.2 2 9.5 L 2 20 C 2 21.1 2.9 22 4 22 L 20 22 C 21.1 22 22 21.1 22 20 L 22 16 L 22 9.5 C 22 9.2 21.9125 8.79375 21.8125 8.59375 L 19.59375 5 C 19.19375 4.4 18.60625 4 17.90625 4 L 6.09375 4 z M 5.90625 6 L 11 6 L 11 9 L 4.1875 9 L 5.90625 6 z M 13 6 L 18.09375 6 L 19.8125 9 L 13 9 L 13 6 z M 9 11 L 15 11 C 15.6 11 16 11.4 16 12 C 16 12.6 15.6 13 15 13 L 9 13 C 8.4 13 8 12.6 8 12 C 8 11.4 8.4 11 9 11 z"></path>
									</svg>
									<p>Isolant type M1 non inflammable</p>	
								</div>
							</div>
							<div class="atout">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" enable-background="new 0 0 24 24">
		 								<path d="M22,6.9v6.3c0,0-1.3,0.3-1.6,0.3c-0.3,0-1.1,0.3-1.7-0.3c-0.9-0.9-4.3-4.4-4.3-4.4S13.9,8.2,13,8.7l-1.5,0.9 C11,9.9,10.2,9.7,9.9,9.2l0,0c-0.4-0.6-0.2-1.4,0.4-1.7c1.2-0.7,3.1-1.8,3.8-2.2c0.6-0.4,1.1-0.4,2,0.4c1.1,0.9,2,1.8,2,1.8 s0.4,0.2,0.8,0.2C19.6,7.5,22,6.9,22,6.9z M9.9,17.8c-0.3-0.3-3.7-4-4-4.3c-0.4-0.5-1.1-0.4-1.7,0c-0.6,0.5-0.8,1.4-0.4,1.9 c0.4,0.5,3.5,3.8,4,4.3c0.4,0.5,1.5,0.3,2-0.2C10.3,19,10.4,18.2,9.9,17.8z M17.6,15.7c0.5-0.5,0.4-1.4-0.1-1.9 c-2.7-2.8-1.7-1.7-3.5-3.6c0,0-0.6-0.7-1.3-0.3c-0.2,0.1-0.5,0.3-0.9,0.5c-0.9,0.6-1.9,0.5-2.8-0.9C8,8.3,8.5,7.3,9.4,6.7l1.7-1.1 c0,0-0.4-0.6-1.6-0.6C8.3,5,5.8,6.8,5.8,6.8S5,7.3,4,6.9L2,6.2v7.2c0,0,0.6,0.2,1.1,0.4c0.1-0.3,0.3-0.7,0.6-0.9 c0.8-0.8,2.3-0.9,3,0c0.5,0.5,3.7,4,4,4.3c0.5,0.5,0.6,1.2,0.5,1.8C11.4,19.2,15.7,17.8,17.6,15.7z"></path>
									</svg>
									<p>Peut être bâti sans permis de contruire</p>	
								</div>
							</div>
							<div class="atout">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									    <path d="M 4 4 L 4 8 L 8 8 L 8 4 L 4 4 z M 10 4 L 10 8 L 14 8 L 14 4 L 10 4 z M 16 4 L 16 8 L 20 8 L 20 4 L 16 4 z M 4 10 L 4 14 L 8 14 L 8 10 L 4 10 z M 10 10 L 10 14 L 14 14 L 14 10 L 10 10 z M 16 10 L 16 14 L 20 14 L 20 10 L 16 10 z M 4 16 L 4 20 L 8 20 L 8 16 L 4 16 z M 10 16 L 10 20 L 14 20 L 14 16 L 10 16 z M 16 16 L 16 20 L 20 20 L 20 16 L 16 16 z"></path>
									</svg>
									<p>Finitions intérieures sol, murs et plafond</p>	
								</div>
							</div>
						</div>
					</div>
				
					<!-- <a href="<?= base_url("gamme/$gamme_url") ?>" class="gamme_nom">
						<article class="produit_gamme" style="background-image: url('<?=img_url()?>gamme/<?= $gamme['miniature'] ?>')">
							<span><?= $gamme['nom'] ?></span>
						</article>
					</a> -->

				<?php endforeach ?>

			</section>

		</section>