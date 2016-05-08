		
	<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('admin/avantage/upload', $attributs); ?>

				<div class="membre_photo_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label id="preview" for="my-file" style="background-image: url('<?=img_url()?>unknown.svg')" tabindex="0"></label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom</label>
				<input type="text" name="nom" placeholder="Confort de vie"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Créer un espace dédié à votre activitée profesionelle et améliorer votre confort de vie ..."></textarea><br />

				<input type="submit" class="button" name="submit" value="Créer un nouvel avantage" />

			</form>

		</section>

		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#preview').css('background-image','url("'+e.target.result+'")');
					}

					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>