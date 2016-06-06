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
				$avis_id = $avis_client[0]['idAvis'];
			?>
				
			<?php echo form_open_multipart('admin/avis/update/'.$avis_id, $attributs); ?>

				<label for="auteur">Auteur</label>
				<input type="text" name="auteur" placeholder="Jacques Chirac" value="<?= $avis_client[0]['auteur'] ?>"/><br />

				<label for="message">Message</label>
				<textarea name="message" placeholder="Trés beau concept, mon Cubroom me permet de travailler au calme"><?= $avis_client[0]['message'] ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour l'avis" />

			</form>

		</section>