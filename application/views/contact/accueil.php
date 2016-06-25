		<section class="cover" style="background-image: url('<?=img_url()?>contact/cover.jpg')">

			<div class="overlay">
				<div class="cover_titre">
					<h1><?= $titre ?></h1>
					<h3><?= $sous_titre ?></h3>
				</div>
			</div>

		</section>

		<section class="content">
			
			<section class="contact">

				<section class="contact_formulaire">

					<div class="succes">
						<?php echo $succes;?>
					</div>
					
					<div class="erreur">
						<?php echo validation_errors(); ?>
						<?php echo $error;?>
					</div>
						
					<?php echo form_open_multipart('contact/envoyer_email'); ?>

						<span>
							<input type="text" name="nom" placeholder="Nom et prénom" value="<?= set_value('nom') ?>"/>
						</span>
						
						<span>
							<input type="email" name="email" placeholder="Adresse email" value="<?= set_value('email') ?>"/>
						</span>	

						<input type="text" name="objet" placeholder="Objet" value="<?= set_value('objet') ?>"/>

						<textarea name="message" placeholder="​Message"><?= set_value('message') ?></textarea>

						<input type="submit" class="button" name="submit" value="Envoyer l'email" />

					</form>
					
				</section>

				<section class="contact_informations">
					
					<p class="uptitle">Vous avez un projet ?</p>
					<h2>Contactez nous</h2>

					<ul>
						<li><?= $entreprise[0]['adresse'] ?></li>
						<li><?= $entreprise[0]['codePostal'] . ' ' . $entreprise[0]['ville'] . ', ' . $entreprise[0]['pays'] ?></li>
						<li>Email : <?= $entreprise[0]['email'] ?></li>
						<li>Téléphone : <?= $entreprise[0]['telephone1'] ?></li>
						<li>Téléphone : <?= $entreprise[0]['telephone2'] ?></li>
					</ul>

				</section>

			</section>

			<div id="carte" style="width:100%; height:400px"></div>

		</section>

		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			var latlng = new google.maps.LatLng(50.7087203, 3.168698);
			//objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
			//de définir des options d'affichage de notre carte
			var options = {
				center: latlng,
				zoom: 15,
				disableDefaultUI: true,
				scrollwheel: false,
				styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}],
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			
			//constructeur de la carte qui prend en paramêtre le conteneur HTML
			//dans lequel la carte doit s'afficher et les options
			var carte = new google.maps.Map(document.getElementById("carte"), options);

			var image = '<?=img_url()?>marker.svg';

			var marqueur = new google.maps.Marker({
				position: new google.maps.LatLng(50.7087203, 3.168698),
				icon: image,
				map: carte
			});
		</script>

		