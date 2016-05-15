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

		<section class="content">

			<section class="accueil_introduction">
						
				<?= $accueil[0]['introduction'] ?>

			</section>

			<section class="accueil_baseline">
						
				<div class="overlay">
					<?= $accueil[0]['baseline'] ?>
				</div>

			</section>

			<section class="accueil_produits">

				<?php foreach ($produits as $produit): ?>

					<?php
						$produit_url = $produit['url'];
					?>

					<article class="accueil_produit">

						<div class="accueil_produit_contenu">
							<div class="accueil_produit_photo" style="background-image: url('<?=img_url()?>produit/<?= $produit['couverture'] ?>')"></div>
							<div class="accueil_produit_info">
								<h3 class="accueil_produit_nom"><?= $produit['nom'] ?></h3>
								<div class="accueil_produit_description"><?= $produit['description'] ?></div>	
							</div>
						</div>
						<div class="accueil_produit_atout">
							<?php foreach ($avantages as $avantage): ?>	
								<div class="atout">
									<div>
										<img src="<?=img_url()?>avantage/<?= $avantage['icone'] ?>">
										<p class="atout_nom"><?= $avantage['nom'] ?></p>
										<p class="atout_description"><?= $avantage['description'] ?></p>
									</div>
									
								</div>
							<?php endforeach ?>	

							<a href="<?= base_url("produit/$produit_url") ?>" class="atout">
								<div>
									<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-454 256 50 50" style="enable-background:new -454 256 50 50;" xml:space="preserve">
										<path d="M-406,256h-30c-0.6,0-1,0.5-1,1v10h2.1v-9h27.9V304H-435v-9h-2.1v10c0,0.6,0.5,1,1,1h30c0.6,0,1-0.5,1-1v-48
										c0-0.5-0.3-0.9-0.8-1C-405.9,256-405.9,256-406,256z M-429.7,271.4c-0.4,0.4-0.4,1,0,1.4l7.2,7.2H-452c0,0,0,0,0,0c-0.6,0-1,0.5-1,1
										c0,0.6,0.5,1,1,1h29.6l-7.2,7.2c-0.1,0-0.1,0.1-0.2,0.2c-0.3,0.4-0.3,1.1,0.2,1.4c0.4,0.3,1.1,0.3,1.4-0.2l8.9-8.9l0.7-0.7l-0.7-0.7
										l-8.9-8.9c-0.2-0.2-0.4-0.3-0.6-0.3C-429.1,271.1-429.4,271.2-429.7,271.4z"/>
									</svg>
									<p>Voir le produit</p>	
								</div>
							</a>
						</div>
					</article>
				
				<?php endforeach; ?>

			</section>

			<section class="accueil_etapes">
						
				<h2>Les étapes clées pour mener à bien votre projet</h2>

				<div class="accueil_etape">
					<span>Étape n°</span><br>
					<p class="number">01<span>.</span></p>
					<p class="accueil_etape_texte">
						<span class="etape_titre">PREMIER RENDEZ-VOUS TELEPHONIQUE</span><br><br>
						<span class="etape_contenu">En fonction de la superficie de votre terrain, vous serez conseillés sur le choix du modèle de bureau ou de studio de jardin ainsi que sur les diffé- rentes options possibles.</span>
					</p>
				</div>

				<div class="accueil_etape">
					<span>Étape n°</span><br>
					<p class="number">02<span>.</span></p>
					<p class="accueil_etape_texte">
						<span class="etape_titre">PREMIER RENDEZ-VOUS TELEPHONIQUE</span><br><br>
						<span class="etape_contenu">En fonction de la superficie de votre terrain, vous serez conseillés sur le choix du modèle de bureau ou de studio de jardin ainsi que sur les diffé- rentes options possibles.</span>
					</p>
				</div>

				<div class="accueil_etape">
					<span>Étape n°</span><br>
					<p class="number">03<span>.</span></p>
					<p class="accueil_etape_texte">
						<span class="etape_titre">PREMIER RENDEZ-VOUS TELEPHONIQUE</span><br><br>
						<span class="etape_contenu">En fonction de la superficie de votre terrain, vous serez conseillés sur le choix du modèle de bureau ou de studio de jardin ainsi que sur les diffé- rentes options possibles.</span>
					</p>
				</div>

				<div class="accueil_etape">
					<span>Étape n°</span><br>
					<p class="number">04<span>.</span></p>
					<p class="accueil_etape_texte">
						<span class="etape_titre">PREMIER RENDEZ-VOUS TELEPHONIQUE</span><br><br>
						<span class="etape_contenu">En fonction de la superficie de votre terrain, vous serez conseillés sur le choix du modèle de bureau ou de studio de jardin ainsi que sur les diffé- rentes options possibles.</span>
					</p>
				</div>

			</section>

			<section class="accueil_validation">

				<p>
				Une fois le feu vert de la Marie et le délai de recours des tiers passé, la fabrication est alors lancé.
				Un contrat sera signé entre les 2 parties dans le but de clarifier les étapes à venir et les obligations de chacun.
				</p>

			</section>

			<!-- <section class="accueil_membres">

				<h2>Qui sommes nous ?</h2>

				<?php foreach ($membres as $membre): ?>
				
					<div class="accueil_membre">
						<div class="accueil_membre_photo" style="background-image: url('<?=img_url()?>membre/<?= $membre['photo']; ?>');"></div>
						<p class="accueil_membre_nom"><?= $membre['prenom'] . ' ' . $membre['nom']; ?></p>
						<p class="accueil_membre_role"><?= $membre['role'] ?></p>
					</div>

				<?php endforeach; ?>

			</section> -->

			<section class="accueil_avis">

				<div class="overlay">

					<h2>Les avis clients</h2>

					<div class="my-slider">
						<ul>
							<li>
								<blockquote><p>On est pas bien ? paisibles, à la fraiche, décontractés du gland. … et on bandera quand on aura envie de bander</p></blockquote><br>
								<span>Les valseuses</span>
							</li>
							<li>
								<blockquote><p>La capote, c’est le soulier de verre de notre génération. On l’enfile quand on rencontre une inconnue, on danse toute la nuit, et puis on la balance</p></blockquote><br>
								<span>Fight Club</span>
							</li>
							<li>
								<blockquote><p>Tu vois, le monde se divise en deux catégories: ceux qui ont un pistolet chargé et ceux qui creusent. Toi tu creuses</p></blockquote><br>
								<span>Le bon, la brute et le truand</span>
							</li>
						</ul>
					</div>
					
				</div>

			</section>

			<section class="accueil_membres">

				<h2>Les derniers articles</h2>

				<?php foreach ($membres as $membre): ?>
				
					<div class="accueil_membre">
						<div class="accueil_membre_photo" style="background-image: url('<?=img_url()?>membre/<?= $membre['photo']; ?>');"></div>
						<p class="accueil_membre_nom"><?= $membre['prenom'] . ' ' . $membre['nom']; ?></p>
						<p class="accueil_membre_role"><?= $membre['role'] ?></p>
					</div>

				<?php endforeach; ?>

			</section>

		</section>