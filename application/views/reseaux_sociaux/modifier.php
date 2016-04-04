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
				$reseaux_sociaux_id = $reseaux_sociaux[0]['idReseauxSociaux'];
			?>
				
			<?php echo form_open_multipart('reseaux_sociaux/update/'.$reseaux_sociaux_id, $attributs); ?>

				<label for="nom">Nom</label>
				<input type="input" name="nom" placeholder="Nom du reseaux_sociaux" value="<?= $reseaux_sociaux[0]['nom'] ?>"/><br />

				<label for="lien">Lien</label>
				<input type="input" name="lien" placeholder="lien du reseaux_sociaux" value="<?= $reseaux_sociaux[0]['lien'] ?>"/><br />

				<div class="input-file-container">
					<input class="input-file" id="my-file" type="file" name="userfile">
					<label for="my-file" class="input-file-trigger" tabindex="0">Importer un logo</label>
				</div>
				<p class="file-return"></p><br />

				<input type="submit" name="submit" value="Mettre à jour le reseau social" />

			</form>

		</section>