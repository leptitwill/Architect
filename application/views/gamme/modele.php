<section class="cover" style="background-image: url('<?=img_url()?>produit/<?=$produit[0]['couverture']?>')">

	<div class="overlay">
		<div class="cover_titre">
			<h1><?= $produit[0]['titre'] ?></h1>
			<h3><?= $produit[0]['sousTitre'] ?></h3>
		</div>
	</div>

</section>

<section class="produit_appel">
	<div>
		<p>
		Vous avez un projet d'aménagement, vous avez des questions ?
	</p>
	<a href="<?= base_url('contact') ?>">Contactez-nous</a>
	</div>
</section>

<section class="content" id="produit_content">

	<section class="gamme">

		<section class="gamme_info">

			<section class="slider_gamme">
				<ul>
					<?php foreach ($images as $image): ?>
						<li data-nav="<?=img_url()?>galerie/<?=$image['nom']?>" class="gamme_gallery" style="background-image: url('<?=img_url()?>galerie/<?=$image['nom']?>')"></li>
					<?php endforeach ?>
				</ul>
			</section>

			<div class="gamme_detail">
				<h2><?= $gamme[0]['nom'] ?></h2>
				<p><?= $gamme[0]['description'] ?></p>
				<ul>
					<li><?= $gamme[0]['atout1'] ?></li>
					<li><?= $gamme[0]['atout2'] ?></li>
					<li>Espace de <?= $gamme[0]['taille'] ?>m²</li>
					<li>A partir de <?= $gamme[0]['prix'] ?> € HT</li>
				</ul>
			</div>

			<div class="gamme_equipement">
				<h3>Équipement de série</h3>
				<p><?= nl2br($gamme[0]['equipementSerie']) ?></p>
			</div>

			<hr>

			<div class="gamme_plan">
				<img src="<?=img_url()?>gamme/<?=$gamme[0]['plan']?>">
			</div>

			<div class="gamme_equipement-option">
				<h3>Équipement en option</h3>
				<p><?= nl2br($gamme[0]['equipementOption']) ?></p>
			</div>
			
		</section>

		<section class="gamme_sidebar">

			<div class="gamme_menu">
				<ul>
					<?php foreach ($gammes_par_produit as $gamme_par_produit): $gamme_url = $gamme_par_produit['url']; $gamme_par_produit_nom = $gamme_par_produit['nom']; $gamme_nom = $gamme[0]['nom']; $gamme_produit = $gamme_par_produit['produit_idProduit']; $produit_url = $produit[0]['url']; ?>
						<a href="<?= base_url("produit/$produit_url/$gamme_url") ?>">
							<li class="<?php if("$gamme_nom"=="$gamme_par_produit_nom"){echo "active";}?>"><?= $gamme_par_produit_nom ?></li>
						</a>
					<?php endforeach ?>
				</ul>
			</div>

			<div class="gamme_resume">
				<table>
					<tr>
						<td>
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 258.024 258.024" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 258.024 258.024">
								<g>
									<path d="m18.658,83.255l89.496-67.487 89.496,67.487c1.262,0.952 2.741,1.412 4.209,1.412 2.122,0 4.218-0.961 5.594-2.786 2.328-3.087 1.712-7.476-1.375-9.804l-93.71-70.666c-2.494-1.882-5.935-1.882-8.429,0l-93.709,70.666c-3.087,2.328-3.702,6.717-1.375,9.804 2.327,3.086 6.716,3.701 9.803,1.374z"/>
									<path d="m242.561,187.24c8.572-10.605 10.421-24.974 4.824-37.5-5.523-12.362-16.804-20.147-30.174-20.825-0.683-0.035-1.371-0.053-2.063-0.053-2.14,0-4.234,0.187-6.284,0.511v-21.899c0-2.197-1.031-4.266-2.786-5.589l-93.71-70.666c-2.494-1.882-5.935-1.882-8.429,0l-93.71,70.666c-1.754,1.323-2.786,3.392-2.786,5.589v118.977c0,3.866 3.134,7 7,7h144.354l17.761,21.973c1.329,1.644 3.33,2.6 5.444,2.6s4.115-0.956 5.444-2.6l19.818-24.518c0.002-0.002 0.003-0.004 0.005-0.006l35.292-43.66zm-221.117-76.276l86.71-65.387 86.71,65.387v23.43c-5.115,3.009-9.519,7.105-12.862,11.988-7.239-10.57-19.396-17.519-33.147-17.519-0.692,0-1.379,0.018-2.061,0.052-13.372,0.678-24.653,8.463-30.176,20.825-5.596,12.525-3.748,26.895 4.825,37.5l26.038,32.212h-126.037v-108.488zm110.887,67.475c-5.244-6.488-6.367-15.296-2.93-22.988 3.331-7.455 10.099-12.148 18.105-12.554 0.447-0.022 0.897-0.034 1.35-0.034 14.417,0 26.147,11.729 26.147,26.147 0,3.866 3.134,7 7,7s7-3.134 7-7c0-14.417 11.729-26.147 26.146-26.147 0.453,0 0.903,0.012 1.352,0.035 8.005,0.406 14.772,5.099 18.103,12.554 3.437,7.692 2.314,16.5-2.93,22.988l-49.671,61.45-49.672-61.451z"/>
								</g>
							</svg>
						</td>
						<td>Espace de <?= $gamme[0]['taille'] ?>m²</td>
					</tr>

					<tr>
						<td colspan="2">A partir de <?= $gamme[0]['prix'] ?> € HT</td>
					</tr>
				</table>
			</div>

			<div class="gamme_devis">
				<a href="<?= base_url('contact') ?>">Demander un devis</a>
			</div>

			<div class="gamme_pdf"><a href="<?=img_url()?>gamme/<?= $gamme[0]['pdf'] ?>" download="<?= $gamme[0]['url'] ?>">&#10141; Télécharger le pdf</a></div>
			
		</section>

	</section>
</section>

<script>
	$(document).ready(function() {
		var menu_gamme = $('.gamme_menu ul li');
		var nombre_menu_gamme = menu_gamme.size();
		var taille_menu_gamme = 100/nombre_menu_gamme + '%';
		
		$(menu_gamme).css('width', taille_menu_gamme);

		setTimeout(function(){
			$(window).scroll(function(){
				var sidebar = $('#produit_content').offset().top,
					footer = $('footer').offset().top,
					scrollTop = $(window).scrollTop(),
					distance = (scrollTop + $('.gamme_sidebar').outerHeight());

				if ($(window).width() > 1000)
				{
					if(distance > footer)
					{
						$('.gamme_sidebar').css('position','fixed').css('top', footer - distance);
					}
					else if($(window).scrollTop() > sidebar)
					{
						$('.gamme_sidebar').css('position','fixed').css('top', '0');
					}
					else
					{
						$('.gamme_sidebar').css('position','absolute');
					}
				}

				else
				{

				};
			});

			$('.unslider-nav ol li').each(function(i){
				var image = $(this).html();
				$(this).css("background-image", "url(" + image + ")");
			});

		}, 200);
	});

	
</script>