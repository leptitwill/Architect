		<section class="content">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('gamme/upload', $attributs); ?>

				<label for="nom">Nom</label>
				<input type="input" name="nom" placeholder="Nom du gamme"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Description du gamme"></textarea><br />

				<label for="specification">Specification</label>
				<textarea name="specification" placeholder="Specification technique de la gamme"></textarea><br />

				<div class="input-file-container">
					<input class="input-file" id="my-file" type="file" name="userfile">
					<label for="my-file" class="input-file-trigger" tabindex="0">Importer un plan</label>
				</div>
				<p class="file-return"></p><br />

				<label for="produit">produit</label>
				<select name="produit">
					<?php foreach ($produits as $produit): ?>
						<option value="<?= $produit['idProduit'] ?>">
							<?= $produit['nom'] ?>
						</option>
					<?php endforeach ?>
				</select><br />

				<div class="input-file-container">
					<input class="input-file" id="my-file2" type="file" name="userfile">
					<label for="my-file2" class="input-file-trigger" tabindex="0">Importer une photo de couverture</label>
				</div>
				<p class="file-return"></p>

				<input type="submit" name="submit" value="Créer un nouveau gamme" />

			</form>

		</section>