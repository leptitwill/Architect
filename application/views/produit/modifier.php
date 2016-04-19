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
				$produit_id = $produit[0]['idProduit'];
			?>
				
			<?php echo form_open_multipart('admin/produit/update/'.$produit_id, $attributs); ?>

				<div class="produit_couverture_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label id="preview" for="my-file" style="background-image: url('<?=img_url()?>produit/<?= $produit[0]['couverture'] ?>')" tabindex="0"></label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom</label>
				<input type="input" name="nom" placeholder="Officecub 1" value="<?= $produit[0]['nom'] ?>"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Une combinaison efficace pour optimiser votre espace au meilleur prix. C'est un espace de travail compact ..."><?= $produit[0]['description'] ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour le produit" />

			</form>

		</section>