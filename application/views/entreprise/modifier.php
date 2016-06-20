		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<div class="succes">
				<?php echo $succes;?>
			</div>

			<div class="erreur">
				<?php echo validation_errors(); ?>
				<?php echo $error;?>
			</div>
				
			<?php echo form_open_multipart('admin/entreprise/update', $attributs); ?>

				<label for="email">Email</label>
				<input type="text" name="email" placeholder="conceptcub@gmail.com" value="<?= set_value('email', $entreprise[0]['email']) ?>"/><br />

				<span class="input_1-2">
					<label for="telephone1">Téléphone 1</label>
					<input type="text" name="telephone1" placeholder="06 90 90 70 59" value="<?= set_value('telephone1', $entreprise[0]['telephone1']) ?>"/><br />
				</span>

				<span class="input_1-2">
					<label for="telephone2">Téléphone 2</label>
					<input type="text" name="telephone2" placeholder="06 90 90 70 59" value="<?= set_value('telephone2', $entreprise[0]['telephone2']) ?>"/><br />
				</span>

				<span class="input_1-2">
					<label for="adresse">Adresse</label>
					<input type="text" name="adresse" placeholder="59 avenue de L'Union" value="<?= set_value('adresse', $entreprise[0]['adresse']) ?>"/><br />
				</span>

				<span class="input_1-2">
					<label for="code_postal">Code postal</label>
					<input type="text" name="code_postal" placeholder="59100" value="<?= set_value('code_postal', $entreprise[0]['codePostal']) ?>"/><br />
				</span>

				<span class="input_1-2">
					<label for="ville">Ville</label>
					<input type="text" name="ville" placeholder="Tourcoing" value="<?= set_value('ville', $entreprise[0]['ville']) ?>"/><br />
				</span>

				<span class="input_1-2">
					<label for="pays">Pays</label>
					<input type="text" name="pays" placeholder="France" value="<?= set_value('pays', $entreprise[0]['pays']) ?>"/><br />
				</span>

				<label for="horaire">Horaire</label>
				<textarea name="horaire"  placeholder="Du lundi au vendredi 9:00 - 12:00 - 14:00 - 18:00"><?= set_value('horaire', $entreprise[0]['horaire']) ?></textarea><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour l'entreprise" />

			</form>

		</section>