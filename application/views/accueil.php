		<section class="cover--home slider_accueil">
			<div class="cover_texte">
				<h2>Créateur d'espace à vivre</h2>
				<p>Nous sommes une agence d'architeture à Tourcoing</p>
			</div>
			<ul>
				<?php foreach ($images as $image): ?>
					<li class="cover--home" style="background-image: url('<?=img_url()?>galerie/<?=$image['nom']?>')"></li>
				<?php endforeach ?>
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

						<a href="<?= base_url("produit/$produit_url") ?>" class="accueil_produit_contenu">
							<div class="accueil_produit_photo" style="background-image: url('<?=img_url()?>produit/<?= $produit['couverture'] ?>')"></div>
							<div class="accueil_produit_info">
								<h3 class="accueil_produit_nom"><?= $produit['nom'] ?></h3>
								<div class="accueil_produit_description"><?= $produit['description'] ?></div>
							</div>
						</a>

						<div class="accueil_produit_atout">
							<?php
								$avantages = $this->produit_model->selectionner_avantage_par_produit_par_id($produit['idProduit']);
							?>
							<?php foreach ($avantages as $avantage): ?>
								<div class="atout">
									<div>
										<img src="<?=img_url()?>avantage/<?= $avantage['icone'] ?>" alt="<?= $avantage['nom'] ?>">
										<p class="atout_nom"><?= $avantage['nom'] ?></p>
										<!-- <p class="atout_description"><?= $avantage['description'] ?></p> -->
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
									<p>Voir nos <?= $produit['nom'] ?></p>
								</div>
							</a>
						</div>
					</article>

				<?php endforeach; ?>

			</section>

			<section class="accueil_etapes">

				<h2>Les étapes clés pour mener à bien votre projet</h2>

				<div class="accueil_etape">
					<span>Étape n°</span><br>
					<p class="number">01<span>.</span></p>
					<div class="accueil_etape_texte">
						<?= $accueil[0]['etape1'] ?>
					</div>
				</div>

				<div class="accueil_etape">
					<span>Étape n°</span><br>
					<p class="number">02<span>.</span></p>
					<div class="accueil_etape_texte">
						<?= $accueil[0]['etape2'] ?>
					</div>
				</div>

				<div class="accueil_etape">
					<span>Étape n°</span><br>
					<p class="number">03<span>.</span></p>
					<div class="accueil_etape_texte">
						<?= $accueil[0]['etape3'] ?>
					</div>
				</div>

				<div class="accueil_etape">
					<span>Étape n°</span><br>
					<p class="number">04<span>.</span></p>
					<div class="accueil_etape_texte">
						<?= $accueil[0]['etape4'] ?>
					</div>
				</div>

			</section>

			<section class="accueil_validation">

				<?= $accueil[0]['validation'] ?>

			</section>

			<section class="accueil_avis">

				<div class="overlay">

					<h2>Les avis clients</h2>

					<div class="slider-avis">
						<ul>
							<?php foreach ($avis_clients as $avis_client): ?>
								<li>
									<blockquote><p><?= $avis_client['message'] ?></p></blockquote><br>
									<span><?= $avis_client['auteur'] ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

				</div>

			</section>

			<section class="accueil_articles">

				<h2>Les derniers articles</h2>

				<?php foreach ($articles as $article): ?>

					<div class="accueil_article">
						<a href="<?= base_url('blog').'/'.$article['url'] ?>">
							<div class="accueil_article_photo" style="background-image: url('<?=img_url()?>blog/<?= $article['couverture'] ?>');"></div>
						</a>
						<h3 class="accueil_article_titre"><?= $article['nom'] ?></h3>
						<span class="article_info"><?= $article['auteur'] . ', le ' . $article['date'] ?></span>
						<p class="accueil_article_description"><?= $article['contenu'] ?></p>
					</div>

				<?php endforeach; ?>

				<a  class="accueil_article_lien" href="<?= base_url("blog") ?>">Voir tous les articles</a>

			</section>

		</section>
