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
				$faq_id = $faq[0]['idFaq'];
			?>
				
			<?php echo form_open_multipart('faq/update/'.$faq_id, $attributs); ?>

				<label for="question">Question</label>
				<input type="input" name="question" placeholder="Votre question" value="<?= $faq[0]['question'] ?>"/><br />

				<label for="reponse">reponse</label>
				<textarea name="reponse" placeholder="Réponse à la question"><?= $faq[0]['reponse'] ?></textarea><br />

				<input type="submit" name="submit" value="Mettre à jour la question" />

			</form>

		</section>