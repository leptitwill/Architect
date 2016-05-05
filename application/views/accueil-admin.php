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

				<form onsubmit= "majAccueil('baseline')">
					<section id="baseline" class="accueil_baseline tiny-inline">
						
						<div class="overlay">
							<?= $accueil[0]['baseline'] ?>
						</div>

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

			<section class="accueil_membres">

				<h2>Qui sommes nous ?</h2>

				<?php foreach ($membres as $membre): ?>
				
					<div class="accueil_membre">
						<div class="accueil_membre_photo" style="background-image: url('<?=img_url()?>membre/<?= $membre['photo']; ?>');"></div>
						<p class="accueil_membre_nom"><?= $membre['prenom'] . ' ' . $membre['nom']; ?></p>
						<p class="accueil_membre_role"><?= $membre['role'] ?></p>
					</div>

				<?php endforeach; ?>

			</section>

			<section class="accueil_avis my-slider">
				<ul class="overlay">
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

				<footer>

					<div class="footer_bloc">
						<ul class="texte">
							<li>Société</li>
							<li>
								<a href="<?= base_url("produit/bureaux-de-jardin"); ?>">
									Contact
								</a>
							</li>
							<li>
								<a href="<?= base_url("faq"); ?>">
									Foire aux questions
								</a>
							</li>
							<li>
								<a href="<?= base_url("produit/bureaux-de-jardin"); ?>">
									Mentions légales
								</a>
							</li>
							<li>
								<a href="<?= base_url("produit/bureaux-de-jardin"); ?>">
									Conditions générales
								</a>
							</li>
						</ul>
					</div>

					<div class="footer_bloc">
						<ul class="texte">
							<li>Horaires</li>
							<li>Du lundi au vendredi</li>
							<li>9:00 - 12:00 - 14:00 - 18:00</li>
							<li>Samedi</li>
							<li>9:00 - 12:00</li>
						</ul>
					</div>

					<div class="footer_bloc">
						<ul class="texte">
							<li>Contact</li>
							<li>59 avenue de L'Union</li>
							<li>59100 Tourcoing, France</li>
							<li>+33 6 07 50 34 86</li>
							<li>conceptcub@gmail.com</li>
						</ul>
					</div>

					<div class="footer_bloc">
						<p><b>Suivez nous</b></p>
						<ul class="reseau_social">
							<?php foreach ($reseaux_sociaux as $reseau_social): ?>
								<?php
									$reseaux_sociaux_id = $reseau_social['idReseauxSociaux'];
								?>
									<a target="_blank" href="<?= $reseau_social['lien'] ?>">
										<li>
											<img src="<?=img_url()?>reseaux_sociaux/<?= $reseau_social['logo']; ?>">
										</li>
									</a>
							<?php endforeach; ?>
						</ul>
						<p>© Conceptcub - Tous droits réservés</p>
					</div>
					
				</footer>

			</div>

		</section>