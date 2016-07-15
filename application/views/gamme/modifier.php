		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>

			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>

			<?php
				$gamme_id = $gamme[0]['idGamme'];
			?>
				
			<?php echo form_open_multipart('admin/gamme/update/'.$gamme_id, $attributs); ?>

				<div class="gamme_couverture_preview">
					<input id="my-file" type="file" name="couverture" onchange="readURL(this, '#preview');">
					<label id="preview" for="my-file" style="background-image: url('<?=img_url()?>gamme/<?= $gamme[0]['couverture'] ?>')" tabindex="0"></label>
					<br><p>Cliquer ci-dessus pour modifier l'image</p>
				</div><br>

				<label for="nom">Nom de la gamme</label>
				<input type="text" name="nom" placeholder="Officecub 1" value="<?= set_value('nom', $gamme[0]['nom']) ?>"/><br />

				<label for="description">Description de la gamme</label>
				<textarea name="description" placeholder="Une combinaison efficace pour optimiser votre espace au meilleur prix. C'est un espace de travail compact ..."><?= set_value('description', $gamme[0]['description']) ?></textarea><br />

				<label for="atout1">Premier atout de la gamme</label>
				<input type="text" name="atout1" placeholder="Idéale pour les particuliers au espace restreints" value="<?= set_value('atout1', $gamme[0]['atout1']) ?>"/><br />

				<label for="atout2">Second atout de la gamme</label>
				<input type="text" name="atout2" placeholder="Pas de création préalable, ni de permis de construire" value="<?= set_value('atout2', $gamme[0]['atout2']) ?>"/><br />
				
				<span class="input_1-2">
					<label for="taille">Taille de la gamme</label>
					<input type="number" name="taille" placeholder="21" value="<?= set_value('taille', $gamme[0]['taille']) ?>"/>
				</span>

				<span class="input_1-2">
					<label for="prix">Prix de la gamme</label>
					<input type="number" name="prix" placeholder="16700" value="<?= set_value('prix', $gamme[0]['prix']) ?>"/>
				</span><br />

				<div class="gamme_couverture_preview">
					<input id="my-file2" type="file" name="plan" onchange="readURL(this, '#preview2');">
					<label id="preview2" for="my-file2" style="background-image: url('<?=img_url()?>gamme/<?= $gamme[0]['plan'] ?>')" tabindex="0"></label>
					<br><p>Cliquer ci-dessus pour modifier le plan</p>
				</div><br>

				<label for="prix">PDF de la gamme</label>
				<div class="input_file">
					<input id="nom_pdf" placeholder="Choisissez un PDF" disabled="disabled" value="<?= $gamme[0]['pdf'] ?>"/>
					<div>
					    <span>télecharger</span>
					    <input id="upload_pdf" type="file" name="pdf"/>
					</div>
				</div>

				<label for="equipement_serie">Équipement de série de la gamme</label>
				<textarea name="equipement_serie" placeholder="Aménagements Exterieurs, Container maritime de 10 pieds ..."><?= set_value('equipement_serie', $gamme[0]['equipementSerie']) ?></textarea><br />

				<label for="equipement_option">Équipement en option de la gamme</label>
				<textarea name="equipement_option" placeholder="Aménagements Exterieurs, Container maritime de 10 pieds ..."><?= set_value('equipement_option', $gamme[0]['equipementOption']) ?></textarea><br />

				<label for="produit">Associer la gamme au produit</label>
				<select name="produit">
					<?php foreach ($produits as $produit): ?>
						<option value="<?= $produit['idProduit'] ?>" <?php if ($produit['idProduit'] == $gamme[0]['produit_idProduit']): ?> selected <?php endif ?>>
							<?= $produit['nom'] ?>
						</option>
					<?php endforeach ?>
				</select><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour la gamme" />

			</form>

		</section>

		<script type="text/javascript">
			function readURL(input, id) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$(id).css('background-image','url("'+e.target.result+'")');
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$('#upload_pdf').change(function(){
				$('#nom_pdf').val($(this).val());
			});
		</script>