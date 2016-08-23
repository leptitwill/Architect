<section class="cover" style="background-image: url('<?=img_url()?>blog/cover.jpg')">

	<div class="overlay">
		<div class="cover_titre">
			<h1><?= $titre ?></h1>
			<h3><?= $sous_titre ?></h3>
		</div>
	</div>

</section>

<section class="content">

	<div class="articles">

		<?php foreach ($articles as $article): ?>

			

		<?php endforeach; ?>

	</div>

</section>



		<section class="content">

			<h1 class="titre"><?= $titre ?></h1>

			<?php foreach ($articles as $article): ?>

				<article class="articles">

					<div class="produit_photo" style="background-image: url('<?=img_url()?>produit/<?= $produit['couverture'] ?>')"></div>
					<div class="produit_info">
						<p class="produit_nom"><?= $produit['nom'] ?></p>
						<a href="<?= base_url("produit/$produit_url") ?>" class="produit_lien"><?= base_url("produit/$produit_url") ?></a>
						<p class="produit_description"><?= nl2br($produit['description']) ?></p>
					</div>

				</article>

			<?php endforeach; ?>

			<a href="<?= base_url("admin/produit/creer"); ?>"><input type="button" class="button" value="Ajouter un produit"></a>

		</section>

		<script type="text/javascript">

			function supprimerProduit(id){
				swal({
					title: 'Supprimer le produit ?',
					text: "Une fois supprimé le produit ne sera plus disponible.",
					showCancelButton: true,
					confirmButtonColor: '#6289a5',
					cancelButtonColor: '#f35f47',
					confirmButtonText: 'Supprimer',
					cancelButtonText: 'Annuler',
					animation: false
				}).then(function(isConfirm) {
					if (isConfirm) {
				    	window.location.href = '<?= base_url() ?>admin/produit/supprimer/' + id;
					}
				})
			}

		</script>
