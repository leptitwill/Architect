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
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);" value="<?= set_value('userfile') ?>">
					<label id="preview" for="my-file" style="background-image: url('<?=img_url()?>produit/<?= $produit[0]['couverture'] ?>')" tabindex="0"></label>
					<br><p>Cliquer ci-dessus pour modifier l'image</p>
				</div><br>

				<label for="nom">Nom du produit</label>
				<input type="text" name="nom" placeholder="Officecub 1" value="<?= set_value('nom', $produit[0]['nom']) ?>"/><br />

				<label for="description">Description du produit</label>
				<textarea name="description" placeholder="Une combinaison efficace pour optimiser votre espace au meilleur prix. C'est un espace de travail compact ..."><?= set_value('description', $produit[0]['description']) ?></textarea><br />

				<label for="titre">Titre sur l'image de couverture</label>
				<input type="text" name="titre" placeholder="Nos studio de jardin" value="<?= set_value('titre', $produit[0]['titre']) ?>"/><br />

				<label for="sous_titre">Sous titre sur l'image de couverture</label>
				<input type="text" name="sous_titre" placeholder="Offrir une réponse efficace aux vraies problématiques sociétales" value="<?= set_value('sous_titre', $produit[0]['sousTitre']) ?>"/><br />
				
				<label>Avantages liés au produit</label>
				<table>
					<?php foreach ($avantages as $avantage): ?>
						<tr>
							<td>
								<p><?= $avantage['nom'] ?></p>
							</td>
							<td>
								<img src="<?=img_url()?>avantage/<?= $avantage['icone'] ?>" alt="<?= $avantage['nom'] ?>" >
							</td>
						</tr>
					<?php endforeach ?>	
					<tr>
						<td>
							<a href="<?= base_url("admin/avantage/$produit_id"); ?>">Gérer les avantages liées au produit</a>
						</td>
					</tr>
				</table>

				<label>Solutions liés au produit</label>
				<table>
					<?php foreach ($solutions as $solution): ?>	
						<tr>
							<td>
								<p><?= $solution['nom'] ?></p>
							</td>
							<td>
								<img src="<?=img_url()?>solution/<?= $solution['icone'] ?>" alt="<?= $solution['nom'] ?>" >
							</td>
						</tr>
					<?php endforeach ?>	
					<tr>
						<td>
							<a href="<?= base_url("admin/solution/$produit_id"); ?>">Gérer les solutions liées au produit</a>
						</td>
					</tr>
				</table>

				<label>Gammes liés au produit</label>
				<table>
					<?php foreach ($gammes as $gamme): ?>
						<tr>
							<td>
								<p><?= $gamme['nom'] ?></p>
							</td>
							<td>
								<p><?= $gamme['prix'] ?>  €</p>
							</td>
						</tr>
					<?php endforeach ?>	
					<tr>
						<td>
							<a href="<?= base_url("admin/gamme/$produit_id"); ?>">Gérer les gammes liées au produit</a>
						</td>
					</tr>
				</table>

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