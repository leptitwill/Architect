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
				$produit_id = $produit[0]['idProduit'];
			?>
				
			<?php echo form_open_multipart('produit/update/'.$produit_id, $attributs); ?>

				<label for="nom">Nom</label>
				<input type="input" name="nom" placeholder="Nom du produit" value="<?= $produit[0]['nom'] ?>"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Description du produit"><?= $produit[0]['description'] ?></textarea><br />

				<div class="input-file-container">
					<input class="input-file" id="my-file" type="file" name="userfile">
					<label for="my-file" class="input-file-trigger" tabindex="0">Importer une photo de couverture</label>
				</div>
				<p class="file-return"></p>

				<input type="submit" name="submit" value="Mettre à jour le produit" />

			</form>

		</section>