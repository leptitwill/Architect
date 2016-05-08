		<section class="content-admin">

			<h1 class="titre"><?= $titre ?><br><span>Pour modifier le contenu cliquez sur les paragraphes</span></h1>

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
				<input type="text" name="nom" placeholder="Officecub 1" value="<?= $produit[0]['nom'] ?>"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Une combinaison efficace pour optimiser votre espace au meilleur prix. C'est un espace de travail compact ..."><?= $produit[0]['description'] ?></textarea><br />

				<label for="titre">Titre</label>
				<input type="text" name="titre" placeholder="Nos studio de jardin" value="<?= $produit[0]['titre'] ?>"/><br />

				<label for="sous_titre">Sous titre</label>
				<input type="text" name="sous_titre" placeholder="Offrir une réponse efficace aux vraies problématiques sociétales" value="<?= $produit[0]['sousTitre'] ?>"/><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour le produit" />

			</form>

		</section>

		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#preview').css('background-image','url("'+e.target.result+'")');
					}

					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>