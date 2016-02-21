		<section class="content">

			<h1 class="titre"><?= $titre_page ?></h1>

			<p class="description">
				Louer un studio dans votre jardin peut vous permettre de générer une rentabilité locative hors norme. Quand un investissement immobilier classique vous rapporte entre 3 et 5% de rendement financier, un GreenKub peut vous rapporter entre 10 et 15%, soit trois fois plus en moyenne.
				Cette rentabilité est simplement liée au fait que vous possédez déjà le terrain sur lequel nous allons implanter votre studio. Vous allez donc optimiser un espace foncier dont vous disposez déjà afin de le rentabiliser.  
			</p>

			<?php foreach ($produits as $produit): ?>

				<ul>
					<li><img src="<?=img_url()?>produits/<?= $produit['miniature']; ?>"><h1><?= $produit['nom']; ?></h1><p><?= $produit['description']; ?></p></li>
				</ul>
			
			<?php endforeach; ?>

		</section>