		<section class="cover" style="background-image: url('<?=img_url()?>produit/<?=$produit[0]['couverture']?>')">

			<div class="overlay">
				<div class="cover_titre">
					<h1><?= $produit[0]['titre'] ?></h1>
					<h3><?= $produit[0]['sousTitre'] ?></h3>
				</div>
			</div>

		</section>

		<section class="produit_appel">
			<div>
				<p>
				Vous avez un projet d'aménagement, vous avez des questions ?
			</p>
			<a href="#">Contactez-nous</a>
			</div>
		</section>

		<section class="content" id="produit_content">

			<section class="produit_introduction">

				<p class="uptitle">Nous vous apportons</p>
				<h2>Des réponses pratiques</h2>

				<?= $produit[0]['description'] ?>

			</section>

			<section class="produit_avantages">

				<?php foreach ($avantages as $avantage): ?>	
					<div class="produit_avantage">
						<img src="<?=img_url()?>avantage/<?= $avantage['icone'] ?>" alt="<?= $avantage['nom'] ?>" >
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

				<div class="content">
					<p class="uptitle">Jetez un coup d'oeil à</p>
					<h2>Nos <?= $produit[0]['nom'] ?></h2>
					
					<?php foreach ($gammes as $gamme): $gamme_url = $gamme['url']; ?>	
						<div class="produit_gamme">
							<div class="produit_gamme_photo" style="background-image: url('<?=img_url()?>gamme/<?= $gamme['miniature'] ?>')">
								<div onclick="chargerGamme('<?= $gamme_url ?>')" class="produit_gamme_nom">
									<h3><?= $gamme['nom'] ?></h3>
								</div>
							</div>

							<div class="produit_atout">
								<div class="atout">
									<div>
										<p>Idéale pour les particuliers au espace restreints</p>	
									</div>
								</div>
								<div class="atout">
									<div>
										<p>Espace de 5m²</p>	
									</div>
								</div>
								<div class="atout">
									<div>
										<p>Pas de création préalable, ni de permis de construire</p>	
									</div>
								</div>
								<div class="atout">
									<div>
										<p>A partir de 16 500 € HT</p>	
									</div>
								</div>
							</div>
						</div>

					<?php endforeach ?>
				</div>

			</section>

		</section>