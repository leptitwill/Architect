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
				$avantage_id = $avantage[0]['idAvantage'];
			?>
				
			<?php echo form_open_multipart('admin/avantage/update/'.$avantage_id, $attributs); ?>

				<div class="avantage_icone_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label for="my-file"tabindex="0">
						<img id="preview" src="<?=img_url()?>avantage/<?= $avantage[0]['icone'] ?>">
					</label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom</label>
				<input type="text" name="nom" placeholder="Confort de vie" value="<?= set_value('nom', $avantage[0]['nom']) ?>"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Créer un espace dédié à votre activitée profesionelle et améliorer votre confort de vie ..."><?= set_value('description', $avantage[0]['description']) ?></textarea><br />

				<label>Liéer l'avantage au(x) produit(s)</label>
				<table id="produit_avantage">
					<?php foreach ($produit_avantages as $produit_avantage): ?>
						<tr>
							<td>
								<p><?= $produit_avantage['nom'] ?></p>
							</td>
							<td class="supprimer" onclick="desassocierProduitAvantage(<?= $produit_avantage['idProduit'] ?>, <?= $avantage[0]['idAvantage'] ?>)">
								Supprimer
							</td>
						</tr>
					<?php endforeach ?>	
					<tr>
						<td class="form_select">
							<select id="select_produit">
								<?php foreach ($produits as $produit): ?>
									<option value="<?= $produit['idProduit'] ?>"><?= $produit['nom'] ?></option>
								<?php endforeach ?>	
							</select>
						</td>
						<td class="ajouter" onclick="associerProduitAvantage(<?= $avantage[0]['idAvantage'] ?>)">
							Ajouter
						</td>
					</tr>
				</table>

				<input type="submit" class="button" name="submit" value="Modifier l'avantage" />

			</form>

		</section>

		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#preview').attr('src',e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			function desassocierProduitAvantage(id, idAvantage){
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url();?>admin/avantage/desassocierProduit',
					data: {
						id: id
					},
					success: function(data) {
						$('#produit_avantage').load("<?= base_url(); ?>admin/avantage/modifier/" + idAvantage + " #produit_avantage");
			        },
				});
			};

			function associerProduitAvantage(idAvantage){
				var select = document.getElementById("select_produit");
				var idProduit = select.options[select.selectedIndex].value;

				$.ajax({
					type: 'POST',
					url: '<?php echo base_url();?>admin/avantage/associerProduit',
					data: {
						idProduit: idProduit,
						idAvantage: idAvantage,
					},
					success: function(data) {
						$('#produit_avantage').load("<?= base_url(); ?>admin/avantage/modifier/" + idAvantage + " #produit_avantage");
			        }
				});
			};
		</script>