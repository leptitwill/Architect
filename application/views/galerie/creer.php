		<section class="content">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('galerie/upload', $attributs); ?>

				<label for="nom">Nom</label>
				<input type="text" name="nom" placeholder="Nom de la galerie"/><br />

				<div class="input-file-container">
					<input class="input-file" id="my-file" type="file" name="userfile[]" multiple>
					<label for="my-file" class="input-file-trigger" tabindex="0">Importer des images</label>
				</div>
				<p class="file-return"></p>

				<input type="submit" name="submit" value="Créer une nouvelle galerie" />

			</form>

		</section>