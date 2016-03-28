		<section class="content">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('faq/upload', $attributs); ?>

				<label for="question">Question</label>
				<input type="input" name="question" placeholder="Votre question"/><br />

				<label for="reponse">Réponse</label>
				<textarea name="reponse" placeholder="Réponse à la question"></textarea><br />

				<input type="submit" name="submit" value="Ajouter une question" />

			</form>

		</section>