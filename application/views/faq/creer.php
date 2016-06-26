		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('admin/faq/upload', $attributs); ?>

				<label for="question">Question</label>
				<input type="text" name="question" placeholder="Quel est la couleur du cheval blanc d'Henry IV" value="<?= set_value('question') ?>"/><br />

				<label for="reponse">Réponse</label>
				<textarea name="reponse" placeholder="La couleur du cheval est blanche"><?= set_value('reponse') ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Ajouter une question" />

			</form>

		</section>