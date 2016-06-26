		<section class="cover" style="background-image: url('<?=img_url()?>mentions/cover.jpg')">

			<div class="overlay">
				<div class="cover_titre">
					<h1><?= $titre ?></h1>
					<h3><?= $sous_titre ?></h3>
				</div>
			</div>

		</section>

		<section class="content">

			<div class="mentions">

				<p><?= nl2br($mentions[0]['contenu']) ?></p>

			</div>

		</section>

		