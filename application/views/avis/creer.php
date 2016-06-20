		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('admin/avis/upload', $attributs); ?>

				<label for="auteur">Auteur</label>
				<input type="text" name="auteur" placeholder="Jacques Chirac" value="<?= set_value('auteur') ?>"/><br />

				<label for="message">Message</label>
				<textarea name="message" placeholder="Trés beau concept, mon Cubroom me permet de travailler au calme"><?= set_value('message') ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Ajouter un avis" />

			</form>

		</section>