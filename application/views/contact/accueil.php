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
						
					<?php echo form_open_multipart('admin/avantage/upload'); ?>

						<span>
							<input type="text" name="nom" placeholder="Nom et prénom"/>
						</span>
						
						<span>
							<input type="mail" name="email" placeholder="Adresse email"/>
						</span>	

						<input type="text" name="email" placeholder="Objet"/>

						<textarea name="message" placeholder="​Message"></textarea>

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
				styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}],
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

		