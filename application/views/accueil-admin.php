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
								<h3>Travailler en extérieur</h3><br>
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
					<section class="accueil_baseline">
						
						<div id="baseline"  class="overlay tiny-inline">
							<?= $accueil[0]['baseline'] ?>
						</div>

					</section>
					<button hidden="hidden" name="submitbtn"></button>
				</form>

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
							<span class="etape_titre">Premier rendez-vous téléphonique</span><br><br>
							<span class="etape_contenu">En fonction de la superficie de votre terrain, vous serez conseillés sur le choix du modèle de bureau ou de studio de jardin ainsi que sur les différentes options possibles.</span>
						</p>
					</div>

					<div class="accueil_etape">
						<span>Étape n°</span><br>
						<p class="number">02<span>.</span></p>
						<p class="accueil_etape_texte">
							<span class="etape_titre">Une étude préliminaire du projet</span><br><br>
							<span class="etape_contenu">Cette étape est la plus importante dans la mesure où votre projet doit avant tout respecter certaines règles du plan local d'urbanisme (PLU) de votre commune.</span>
						</p>
					</div>

					<div class="accueil_etape">
						<span>Étape n°</span><br>
						<p class="number">03<span>.</span></p>
						<p class="accueil_etape_texte">
							<span class="etape_titre">Réalisation des documents administratifs</span><br><br>
							<span class="etape_contenu">Réalisation des documents administratifs, déclaration préalable ou permis de construire pour un coût de 600 euros. vous êtes dégagés des démarches administratifs.</span>
						</p>
					</div>

					<div class="accueil_etape">
						<span>Étape n°</span><br>
						<p class="number">04<span>.</span></p>
						<p class="accueil_etape_texte">
							<span class="etape_titre">Nous préparons un avant projet regroupant</span><br><br>
							<span class="etape_contenu">1. Un plan d'implantation<br>
							2. Plan et descriptif<br>
							3. Un devis détaillé<br>
							4. La liste des options<br>
							Nous rédigeons un devis ferme et définitif.</span>
						</p>
					</div>

				</section>

				<section class="accueil_validation">

					<p>
					Une fois le feu vert de la Marie et le délai de recours des tiers passé, la fabrication est alors lancé.
					Un contrat sera signé entre les 2 parties dans le but de clarifier les étapes à venir et les obligations de chacun.
					</p>

				</section>

				<section class="accueil_avis">

					<div class="overlay">

						<h2>Les avis clients</h2>

						<div class="my-slider">
							<ul>
								<li>
									<blockquote><p>On est pas bien ? paisibles, à la fraiche, sirotant un nestea dans mon studio de jardin.</p></blockquote><br>
									<span>Eden Hazard</span>
								</li>
								<li>
									<blockquote><p>Super ce bureaux de jardin ! Je peux enfin travailler tranquilement sans que ma femme vienne m'embêter.</p></blockquote><br>
									<span>José Morinho</span>
								</li>
								<li>
									<blockquote><p>Tu vois, le monde se divise en deux catégories: ceux qui ont un studio de jardin et ceux qui en on pas.</p></blockquote><br>
									<span>Selena Gomez</span>
								</li>
							</ul>
						</div>
						
					</div>

				</section>

				<section class="accueil_articles">

					<h2>Les derniers articles</h2>
				
					<div class="accueil_article">
						<div class="accueil_article_photo" style="background-image: url('<?=img_url()?>blog/article-1.jpg');"></div>
						<a href=""><h3 class="accueil_article_titre">American Gothic</h3></a>
						<p class="accueil_article_description">
							American Gothic est un tableau de Grant Wood faisant partie de la collection de l'Institut d'art de Chicago. Wood a été inspiré par un chalet conçu dans le style néogothique avec une fenêtre supérieure distinctive.
						</p>
					</div>

					<div class="accueil_article">
						<div class="accueil_article_photo" style="background-image: url('<?=img_url()?>blog/article-2.jpg');"></div>
						<a href=""><h3 class="accueil_article_titre">Le Désespéré</h3></a>
						<p class="accueil_article_description">
							Le Désespéré est un tableau du peintre français Gustave Courbet réalisé entre 1843 et 1845. C'est un autoportrait de l'artiste sous les traits d'un jeune homme grand, beau et brun qui regarde avec désespoir vers moi. 							
						</p>
					</div>

					<div class="accueil_article">
						<div class="accueil_article_photo" style="background-image: url('<?=img_url()?>blog/article-3.jpg');"></div>
						<a href=""><h3 class="accueil_article_titre">La nevada</h3></a>
						<p class="accueil_article_description">
							La nevada ou El invierno est une peinture réalisée par Francisco de Goya en 1786 et faisant partie de la cinquième série des cartons pour tapisserie destinée à la salle à manger du Prince des Asturies au Palais du Pardo.
						</p>
					</div>

					<a  class="accueil_article_lien" href="#">Voir tous les articles</a>

				</section>

			</div>

		</section>