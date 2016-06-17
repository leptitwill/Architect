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
				$solution_id = $solution[0]['idSolution'];
			?>
				
			<?php echo form_open_multipart('admin/solution/update/'.$solution_id, $attributs); ?>

				<div class="solution_icone_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label for="my-file"tabindex="0">
						<img id="preview" src="<?=img_url()?>solution/<?= $solution[0]['icone'] ?>">
					</label>
					<br><p>Cliquer ci-dessus pour ajouter une image</p>
				</div><br>

				<label for="nom">Nom</label>
				<input type="text" name="nom" placeholder="Solution pour les particuliers" value="<?= set_value('nom', $solution[0]['nom']) ?>"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Au travailleurs indépendants/freelances travaillant à domicile, exerçant une profession libérale ..."><?= set_value('description', $solution[0]['description']) ?></textarea><br />

				<label>Liéer la solution au(x) produit(s)</label>
				<table id="produit_solution">
					<?php foreach ($produit_solutions as $produit_solution): ?>
						<tr>
							<td>
								<p><?= $produit_solution['nom'] ?></p>
							</td>
							<td class="supprimer" onclick="desassocierProduitSolution(<?= $produit_solution['idProduit'] ?>, <?= $solution[0]['idSolution'] ?>)">
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
						<td class="ajouter" onclick="associerProduitSolution(<?= $solution[0]['idSolution'] ?>)">
							Ajouter
						</td>
					</tr>
				</table>

				<input type="submit" class="button" name="submit" value="Modifier la solution" />

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

			function desassocierProduitSolution(id, idSolution){
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url();?>admin/solution/desassocierProduit',
					data: {
						id: id
					},
					success: function(data) {
						$('#produit_solution').load("<?= base_url(); ?>admin/solution/modifier/" + idSolution + " #produit_solution");
			        },
				});
			};

			function associerProduitSolution(idSolution){
				var select = document.getElementById("select_produit");
				var idProduit = select.options[select.selectedIndex].value;

				$.ajax({
					type: 'POST',
					url: '<?php echo base_url();?>admin/solution/associerProduit',
					data: {
						idProduit: idProduit,
						idSolution: idSolution,
					},
					success: function(data) {
						$('#produit_solution').load("<?= base_url(); ?>admin/solution/modifier/" + idSolution + " #produit_solution");
			        }
				});
			};
		</script>