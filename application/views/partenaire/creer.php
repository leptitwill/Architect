		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('admin/partenaire/upload', $attributs); ?>

				<div class="reseau_social_logo_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label for="my-file" tabindex="0">
						<img id="preview" src="<?=img_url()?>unknown.svg">
					</label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom</label>
				<input type="input" name="nom" placeholder="Nexity"/><br />

				<label for="type">Domaine d'activité</label>
				<input type="input" name="type" placeholder="Promoteur immobilier"/><br />

				<input type="submit" class="button" name="submit" value="Créer un nouveau partenaire" />

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