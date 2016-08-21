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
				$etape_id = $etape[0]['idEtape'];
			?>

			<?php echo form_open_multipart('admin/etape/update/'.$etape_id, $attributs); ?>

				<label for="titre">Titre</label>
				<input type="text" name="titre" placeholder="Quel est la couleur du cheval blanc d'Henry IV" value="<?= set_value('titre',$etape[0]['titre']) ?>"/><br />

				<label for="contenu">Contenu</label>
				<textarea name="contenu" placeholder="La couleur du cheval est blanche"><?= set_value('contenu', $etape[0]['contenu']) ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour l' étape" />

			</form>

		</section>
