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
				$galerie_id = $galerie[0]['idGalerie'];
			?>
				
			<?php echo form_open_multipart('admin/galerie/update/'.$galerie_id, $attributs); ?>

				<?php foreach ($images as $image): ?>
					<div class="galerie_image" id="<?= $image['idImage'] ?>" style="background-image: url('<?=img_url()?>galerie/<?= $image['nom'] ?>')"></div>
				<?php endforeach ?>	<br><br>

				<label for="nom">Nom de l'image</label>
				<input type="text" name="nom" placeholder="Image 1" value="<?= set_value('nom') ?>"/><br />

				<label for="galerie">Ajouter une image</label>
				<div class="input_file">
					<input id="nom_image" placeholder="Choisissez une image" disabled="disabled"/>
					<div>
					    <span>télécharger</span>
					    <input id="upload_image" type="file" name="image"/>
					</div>
				</div>

				<input type="submit" class="button" name="submit" value="Ajouter l'image" />

			</form>

		</section>

		<script type="text/javascript">
			$('#upload_image').change(function(){
				$('#nom_image').val($(this).val());
			});

			$(".galerie_image").click(function(){
				var id = $(this).attr('id');
				var idGalerie = <?= $galerie[0]['idGalerie']; ?>;

				swal({
					title: 'Supprimer l\'image ?',
					text: "Une fois supprimé l\'image ne sera plus disponible.",
					showCancelButton: true,
					confirmButtonColor: '#6289a5',
					cancelButtonColor: '#f35f47',
					confirmButtonText: 'Supprimer',
					cancelButtonText: 'Annuler',
					animation: false
				}).then(function(isConfirm) {
					if (isConfirm) {
				    	window.location.href = '<?= base_url() ?>admin/galerie/supprimer_image/' + id + '/' + idGalerie;
					}
				})
			});
		</script>