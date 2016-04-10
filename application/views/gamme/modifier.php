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
				$gamme_id = $gamme[0]['idGamme'];
			?>
				
			<?php echo form_open_multipart('gamme/update/'.$gamme_id, $attributs); ?>

				<label for="nom">Nom</label>
				<input type="input" name="nom" placeholder="Nom de la gamme" value="<?= $gamme[0]['nom'] ?>"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Description de la gamme"><?= $gamme[0]['description'] ?></textarea><br />

				<label for="description">Specification</label>
				<textarea name="specification" placeholder="Specification de la gamme"><?= $gamme[0]['specification'] ?></textarea><br />

				<div class="input-file-container">
					<input class="input-file" id="my-file" type="file" name="userfile">
					<label for="my-file" class="input-file-trigger" tabindex="0">Importer une photo de couverture</label>
				</div>
				<p class="file-return"></p><br>

				<label for="produit">Produit</label>
				<select name="produit">
					<?php foreach ($produits as $produit): ?>
						<option value="<?= $produit['idProduit'] ?>" <?php if ($produit['idProduit'] == $gamme[0]['produit_idProduit']): ?> selected <?php endif ?>>
							<?= $produit['nom'] ?>
						</option>
					<?php endforeach ?>
				</select><br />

				<input type="submit" name="submit" value="Mettre à jour la gamme" />

			</form>

		</section>