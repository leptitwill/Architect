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
				$partenaire_id = $partenaire[0]['idPartenaire'];
			?>
				
			<?php echo form_open_multipart('admin/partenaire/update/'.$partenaire_id, $attributs); ?>

				<div class="reseau_social_logo_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label for="my-file" tabindex="0">
						<img id="preview" src="<?=img_url()?>partenaire/<?= $partenaire[0]['logo'] ?>">
					</label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom</label>
				<input type="text" name="nom" placeholder="Nexity" value="<?= $partenaire[0]['nom'] ?>"/><br />

				<label for="type">Domaine d'activité</label>
				<input type="text" name="type" placeholder="Promoteur immobilier" value="<?= $partenaire[0]['type'] ?>"/><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour le partenaire" />

			</form>

		</section>

		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#preview').attr('src',e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>