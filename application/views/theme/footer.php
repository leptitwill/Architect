		<footer>

			<div class="footer_bloc">
				<ul class="texte">
					<li>Horaires</li>
					<li>Du lundi au vendredi</li>
					<li>9:00 - 12:00 - 14:00 - 18:00</li>
					<li>Samedi</li>
					<li>9:00 - 12:00</li>
				</ul>
			</div>

			<div class="footer_bloc">
				<ul class="texte">
					<li>Contact</li>
					<li>59 avenue de L'Union</li>
					<li>59100 Tourcoing, France</li>
					<li>+33 6 07 50 34 86</li>
					<li>conceptcub@gmail.com</li>
				</ul>
			</div>

			<div class="footer_bloc_newsletter">
				<ul class="texte">
					<li>Newsletter</li>
					<li>Suivez notre actualitées en vous inscrivant à notre newsletter</li>
				</ul>
				<form>
					<input type="email" name="email" placeholder="Votre adresse email">
					<span>
						<button type="submit">S'inscrire</button>
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
			
		</footer>

		<?=js('unslider.min.js')?>
		<script>

			$(document).ready(function($) {
				$('.my-slider').unslider({
					autoplay: true,
					delay: 5000,
					infinite: true,
					nav: false,
				});
			});

		</script>

	</body>

</html>