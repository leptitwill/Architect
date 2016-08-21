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
					<?php foreach ($avantages as $avantage): ?>
						<li>
							<img src="<?=img_url()?>avantage/<?= $avantage['icone'] ?>" alt="<?= $avantage['nom'] ?>">
							<h3><?= $avantage['nom'] ?></h3>
							<p><?= nl2br($avantage['description']) ?></p>
						</li>
					<?php endforeach; ?>
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
								<p class="concept_membre_bio"><?= nl2br($membre['description']) ?></p>
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
					<?php foreach ($faqs as $faq): ?>
						<span><?= $faq['question'] ?></span>
						<p><?= $faq['reponse'] ?></p>
					<?php endforeach; ?>
				</div>

			</section>

			<section class="concept_etapes">

				<div class="content">

					<h2>LES ÉTAPES CLÉES</h2>

					<?php $i = 1; foreach ($etapes as $etape): ?>

						<div class="concept_etape">
							<span><? if($i<10){echo"0".$i;};$i ?></span>
							<div class="etape_contenu">
								<h3><?= $etape['titre'] ?></h3>
								<p><?= $etape['contenu'] ?></p>
							</div>
						</div>

					<?php $i++; endforeach; ?>
				</div>

			</section>

		</section>
