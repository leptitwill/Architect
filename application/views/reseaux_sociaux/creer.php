		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('admin/reseaux_sociaux/upload', $attributs); ?>

				<div class="reseau_social_logo_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label for="my-file" tabindex="0">
						<img id="preview" src="<?=img_url()?>unknown.svg">
					</label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom</label>
				<input type="text" name="nom" placeholder="Facebook"/><br />

				<label for="lien">Lien</label>
				<input type="text" name="lien" placeholder="www.facebook.com/conceptcub"/><br />

				<input type="submit" class="button" name="submit" value="Créer un nouveau reseau social" />

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