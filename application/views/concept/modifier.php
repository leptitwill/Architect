		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>

			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('admin/mentions/update', $attributs); ?>

				<label for="mentions">Mentions légales</label>
				<textarea name="mentions" placeholder="Vos mentions légales"><?= set_value('mentions', $mentions[0]['contenu']) ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour les mentions légales" />

			</form>

		</section>