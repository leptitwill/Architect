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
				$membre_id = $membre[0]['idMembre'];
			?>
				
			<?php echo form_open_multipart('admin/membre/update/'.$membre_id, $attributs); ?>

				<div class="membre_photo_preview">
					<input id="my-file" type="file" name="userfile" onchange="readURL(this);">
					<label id="preview" for="my-file" style="background-image: url('<?=img_url()?>membre/<?= $membre[0]['photo'] ?>')" tabindex="0"></label>
				</div><br>

				<label for="prenom">Prénom</label>
				<input type="input" name="prenom" placeholder="Votre prénom" value="<?= $membre[0]['prenom'] ?>"/><br />

				<label for="nom">Nom</label>
				<input type="input" name="nom" placeholder="Votre nom" value="<?= $membre[0]['nom'] ?>"/><br />

				<label for="email">Email</label>
				<input type="mail" name="email" placeholder="Votre email" value="<?= $membre[0]['email'] ?>"/><br />

				<label for="role">Rôle</label>
				<input type="input" name="role" placeholder="Rôle du membre" value="<?= $membre[0]['role'] ?>"/><br />

				<label for="description">Description</label>
				<textarea name="description" placeholder="Description du membre"><?= $membre[0]['description'] ?></textarea><br />

				<label for="mot_de_passe">Mot de passe</label>
				<input type="password" name="mot_de_passe" placeholder="Mot de passe" value="<?= $membre[0]['motDePasse'] ?>"/><br />

				<label for="profil">Profil</label>
				<select name="profil">
					<?php foreach ($profils as $profil): ?>	
						<option value="<?= $profil['idProfil'] ?>" <?php if ($profil['idProfil'] == $membre[0]['profil']): ?> selected <?php endif ?>>
							<?= $profil['nom'] ?>
						</option>
					<?php endforeach ?>
				</select><br />

				<input type="submit" class="button" name="submit" value="Mettre à jour le membre" />

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