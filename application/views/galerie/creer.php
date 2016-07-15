		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>
			
			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('admin/produit/upload', $attributs); ?>

				<div class="produit_couverture_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label id="preview" for="my-file" style="background-image: url('<?=img_url()?>unknown-landscape.svg')" tabindex="0"></label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom du produit</label>
				<input type="text" name="nom" placeholder="Studio de jardin" value="<?= set_value('nom') ?>"/><br />

				<label for="description">Description du produit</label>
				<textarea name="description" placeholder="​Une combinaison efficace pour optimiser votre espace au meilleur prix. C'est un espace de travail compact ..." ><?= set_value('description') ?></textarea><br />

				<label for="titre">Titre sur l'image de couverture</label>
				<input type="text" name="titre" placeholder="Nos studio de jardin" value="<?= set_value('titre') ?>"/><br />

				<label for="sous_titre">Sous titre sur l'image de couverture</label>
				<input type="text" name="sous_titre" placeholder="Offrir une réponse efficace aux vraies problématiques sociétales" value="<?= set_value('sous_titre') ?>"/><br />

				<input type="submit" class="button" name="submit" value="Créer un nouveau produit" />

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
			};

		</script>