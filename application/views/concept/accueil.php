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

			<section class="concept_operatoire">

				<h2>COMMENT NOS CUBS SONT RÉALISÉS ET INSTALLÉS ?</h2>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas finibus velit a urna ultricies, nec pellentesque felis auctor. Nunc fringilla urna in turpis accumsan, ut viver-
					ra turpis ultrices. Donec eget iaculis quam. Aliquam erat volutpat. Nam augue augue, imperdiet vitae nisl vel, aliquet malesuada erat.
				</p>

				<div class="onglet">
					<span>Fabrication en atelier</span>
					<p>
						L'ensemble de notre gamme est fabriqué en France , dans nos ateliers . Entrant dans une démarche écologique de recyclage , nos CUBS sont conçus à partir de containers ma-
						ritimes complètement réhabilités qui proposent ainsi une architecture contemporaine et des intérieurs cosys et fonctionnels. La réalisation en atelier nous permet de réduire

						au maximum le temps de fabrication et d’éviter les aléas météorologiques qui sont souvent la cause de l’allongement de la durée d’un chantier.
					</p>

					<span>Fabrication en atelier</span>
					<p>
						L'ensemble de notre gamme est fabriqué en France , dans nos ateliers . Entrant dans une démarche écologique de recyclage , nos CUBS sont conçus à partir de containers ma-
						ritimes complètement réhabilités qui proposent ainsi une architecture contemporaine et des intérieurs cosys et fonctionnels. La réalisation en atelier nous permet de réduire

						au maximum le temps de fabrication et d’éviter les aléas météorologiques qui sont souvent la cause de l’allongement de la durée d’un chantier.
					</p>

					<span>Fabrication en atelier</span>
					<p>
						L'ensemble de notre gamme est fabriqué en France , dans nos ateliers . Entrant dans une démarche écologique de recyclage , nos CUBS sont conçus à partir de containers ma-
						ritimes complètement réhabilités qui proposent ainsi une architecture contemporaine et des intérieurs cosys et fonctionnels. La réalisation en atelier nous permet de réduire

						au maximum le temps de fabrication et d’éviter les aléas météorologiques qui sont souvent la cause de l’allongement de la durée d’un chantier.
					</p>

					<span>Fabrication en atelier</span>
					<p>
						L'ensemble de notre gamme est fabriqué en France , dans nos ateliers . Entrant dans une démarche écologique de recyclage , nos CUBS sont conçus à partir de containers ma-
						ritimes complètement réhabilités qui proposent ainsi une architecture contemporaine et des intérieurs cosys et fonctionnels. La réalisation en atelier nous permet de réduire

						au maximum le temps de fabrication et d’éviter les aléas météorologiques qui sont souvent la cause de l’allongement de la durée d’un chantier.
					</p>

					<span>Fabrication en atelier</span>
					<p>
						L'ensemble de notre gamme est fabriqué en France , dans nos ateliers . Entrant dans une démarche écologique de recyclage , nos CUBS sont conçus à partir de containers ma-
						ritimes complètement réhabilités qui proposent ainsi une architecture contemporaine et des intérieurs cosys et fonctionnels. La réalisation en atelier nous permet de réduire

						au maximum le temps de fabrication et d’éviter les aléas météorologiques qui sont souvent la cause de l’allongement de la durée d’un chantier.
					</p>
				</div>

			</section>

		</section>
