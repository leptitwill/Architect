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
				$article_id = $article[0]['idArticle'];
			?>

			<?php echo form_open_multipart('admin/blog/update/'.$article_id, $attributs); ?>

				<div class="produit_couverture_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);" value="<?= set_value('userfile') ?>">
					<label id="preview" for="my-file" style="background-image: url('<?=img_url()?>blog/<?= $article[0]['couverture'] ?>')" tabindex="0"></label>
					<br><p>Cliquer ci-dessus pour modifier l'image</p>
				</div><br>

				<label for="nom">Nom de l'article</label>
				<input type="text" name="nom" placeholder="Les 5 raison d'acheter un Cub" value="<?= set_value('nom', $article[0]['nom']) ?>"/><br />

				<label for="contenu">Contenu du produit</label>
				<textarea name="contenu" placeholder="​PArchitecture vous propose ses services pour des projets de réhabilitation. Réhabilitation d'une maison, centre ville d' Arras. ..."><?= set_value('contenu', $article[0]['contenu']) ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour l'article" />

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
