		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('admin/solution/upload', $attributs); ?>

				<div class="solution_icone_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label for="my-file" tabindex="0">
						<img id="preview" src="<?=img_url()?>unknown.svg">
					</label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom</label>
				<input type="text" name="nom" placeholder="Solution pour les particuliers" value="<?= set_value('nom') ?>"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Au travailleurs indépendants/freelances travaillant à domicile, exerçant une profession libérale ..."><?= set_value('description') ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Créer une nouvelle solution" />

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