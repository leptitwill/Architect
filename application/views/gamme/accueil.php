		<section class="content">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>

			<a href="<?= base_url("Gamme/creer"); ?>"><input type="button" class="button" value="Ajouter une gamme"></a>

			<?php foreach ($gammes as $gamme): ?>

				<?php
					$gamme_id = $gamme['idGamme'];
					$gamme_url = $gamme['url'];
				?>

				<article class="gamme">

					<div class="modifier_gamme">
						<a href="<?= base_url("gamme/modifier/$gamme_id"); ?>" id="<?= $gamme['idGamme'] ?>">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
								<path fill="#E57373" d="M42.583,9.067l-3.651-3.65c-0.555-0.556-1.459-0.556-2.015,0l-1.718,1.72l5.664,5.664l1.72-1.718C43.139,10.526,43.139,9.625,42.583,9.067"></path>
								<rect x="4.465" y="21.524" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 56.4088 27.6943)" fill="#FF9800" width="36.007" height="8.011"></rect>
								<rect x="34.61" y="7.379" transform="matrix(0.7069 -0.7074 0.7074 0.7069 2.679 29.236)" fill="#B0BEC5" width="4.006" height="8.013"></rect>
								<polygon fill="#FFC107" points="6.905,35.43 5,43 12.571,41.094 "></polygon>
								<polygon fill="#37474F" points="5.965,39.172 5,43 8.827,42.035 "></polygon>
							</svg>
						</a>
					</div>

					<div class="supprimer_gamme">
						<a href="<?= base_url("gamme/supprimer/$gamme_id"); ?>" id="<?= $gamme['idGamme'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette gamme ?'));">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
								<path fill="#9FA8DA" d="M11,13v25c0,2.209,1.791,4,4,4h16c2.209,0,4-1.791,4-4V13H11z"></path>
								<g>
									<rect x="22" y="15" fill="#7986CB" width="2" height="23"></rect>
									<rect x="28" y="15" fill="#7986CB" width="2" height="23"></rect>
									<rect x="16" y="15" fill="#7986CB" width="2" height="23"></rect>
								</g>
								<g>
									<rect x="11" y="10" fill="#5C6BC0" width="24" height="4"></rect>
									<rect x="9" y="13" fill="#5C6BC0" width="28" height="4"></rect>
									<path fill="#5C6BC0" d="M19,12V8h8v4h2V8c0-1.104-0.896-2-2-2h-8c-1.104,0-2,0.896-2,2v4H19z"></path>
								</g>
							</svg>
						</a>
					</div>

					<img class="gamme_photo" src="<?=img_url()?>gamme/<?= $gamme['miniature']; ?>">
					<div class="gamme_info">
						<a href="<?= base_url("gamme/$gamme_url") ?>" class="gamme_nom"><?= $gamme['nom'] ?></a>
						<p class="gamme_role"><?= $gamme['url'] ?></p>
						<p class="gamme_description"><?= $gamme['description'] ?></p><br>
						<p class="gamme_description"><?= $gamme['specification'] ?></p>	
					</div>

				</article>
			
			<?php endforeach; ?>

		</section>