		<section class="content">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('partenaire/upload', $attributs); ?>

				<label for="nom">Nom</label>
				<input type="input" name="nom" placeholder="Nom du partenaire"/><br />

				<div class="input-file-container">
					<input class="input-file" id="my-file" type="file" name="userfile">
					<label for="my-file" class="input-file-trigger" tabindex="0">Importer un logo</label>
				</div>
				<p class="file-return"></p><br />

				<input type="submit" name="submit" value="Créer un nouveau partenaire" />

			</form>

		</section>