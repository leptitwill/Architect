		<section class="content">

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
				
			<?php echo form_open_multipart('partenaire/update/'.$partenaire_id, $attributs); ?>

				<label for="nom">Nom</label>
				<input type="input" name="nom" placeholder="Nom du partenaire" value="<?= $partenaire[0]['nom'] ?>"/><br />

				<div class="input-file-container">
					<input class="input-file" id="my-file" type="file" name="userfile">
					<label for="my-file" class="input-file-trigger" tabindex="0">Importer un logo</label>
				</div>
				<p class="file-return"></p><br />

				<input type="submit" name="submit" value="Mettre à jour le partenaire" />

			</form>

		</section>