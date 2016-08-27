		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>

			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>

			<?php echo form_open_multipart('admin/blog/upload', $attributs); ?>

				<div class="produit_couverture_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label id="preview" for="my-file" style="background-image: url('<?=img_url()?>unknown-landscape.svg')" tabindex="0"></label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom de l'article</label>
				<input type="text" name="nom" placeholder="Les 5 raison d'acheter un Cub" value="<?= set_value('nom') ?>"/><br />

				<label for="contenu">Contenu de l'article</label>
				<textarea name="contenu" placeholder="​PArchitecture vous propose ses services pour des projets de réhabilitation. Réhabilitation d'une maison, centre ville d' Arras. ..." ><?= set_value('contenu') ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Créer un nouveau article" />

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
