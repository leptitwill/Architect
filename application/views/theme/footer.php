		<footer>

			<section class="footer_content">
				<div class="footer_bloc">
					<ul class="texte">
						<li>Horaires</li>
						<li><?= nl2br($entreprise[0]['horaire']) ?></li>
					</ul>
				</div>

				<div class="footer_bloc">
					<ul class="texte">
						<li>Contact</li>
						<li><?= $entreprise[0]['adresse'] ?></li>
						<li><?= $entreprise[0]['codePostal'] . ' ' . $entreprise[0]['ville'] . ', ' . $entreprise[0]['pays'] ?></li>
						<li><?= $entreprise[0]['telephone1'] ?></li>
						<li><?= $entreprise[0]['email'] ?></li>
					</ul>
				</div>

				<div class="footer_bloc_newsletter">
					<ul class="texte">
						<li>Newsletter</li>
						<li>Suivez notre actualitées en vous inscrivant à notre newsletter</li>
					</ul>
					<form>
						<input type="email" id="email_client" name="email" placeholder="Votre adresse email" required>
						<span>
							<button type="submit" onclick="ajouterEmail()">S'inscrire</button>
						</span>
					</form>
				</div>

				<div class="footer_bloc_bas">

					<div>
						<p>© Conceptcub - Tous droits réservés</p>
					</div>

					<div>
						<ul class="footer_menu">
							<li>
								<a class="<?php if($this->uri->segment(1)=="contact"){echo "active";}?>" href="<?= base_url("contact"); ?>">
									Contact
								</a>
							</li>
							<li>
								<a class="<?php if($this->uri->segment(1)=="faq"){echo "active";}?>" href="<?= base_url("faq"); ?>">
									FAQ
								</a>
							</li>
							<li>
								<a class="<?php if($this->uri->segment(1)=="mentions-legales"){echo "active";}?>" href="<?= base_url("mentions-legales"); ?>">
									Mentions légales
								</a>
							</li>
						</ul>
					</div>

					<div>

						<ul class="reseau_social">
							<?php foreach ($reseaux_sociaux as $reseau_social): ?>
								<?php
									$reseaux_sociaux_id = $reseau_social['idReseauxSociaux'];
								?>
									<a target="_blank" href="<?= $reseau_social['lien'] ?>">
										<li>
											<img src="<?=img_url()?>reseaux_sociaux/<?= $reseau_social['logo']; ?>">
										</li>
									</a>
							<?php endforeach; ?>
						</ul>

					</div>

				</div>
			</section>

		</footer>

		<?=js('unslider.min.js')?>
		<script>

			function ouvrir_menu_mobile() {
				$('nav').toggleClass('nav_active');
			}

			$(document).ready(function($) {
				$('.slider_accueil').unslider({
					autoplay: false,
					delay: 5000,
					infinite: true,
					nav: false,
				});

				$('.slider-avis').unslider({
					autoplay: false,
					delay: 5000,
					infinite: true,
					nav: false,
				});

				$('.slider_gamme').unslider({
					autoplay: false,
					delay: 5000,
					infinite: true,
					nav: true,
					arrows: false,
				});
			});

			function ajouterEmail(){
				var email = $("#email_client").val();

				if( isEmail(email)) {
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url();?>accueil/ajouterEmail',
						data: {
							email: email
						},
						success: function(result) {

						},
					});
				}
			};

			function isEmail(email) {
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return regex.test(email);
			}

			$('.onglet span').click(function(){
				if($(this).hasClass('actif')){

				} else {
					$('.onglet span').removeClass('actif');
					$('.onglet span').next().slideUp('ease');
					$(this).addClass('actif');
					$(this).next().slideToggle('ease');
				}
			});

		</script>

	</body>

</html>
