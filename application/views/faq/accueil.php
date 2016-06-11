		<section class="cover" style="background-image: url('<?=img_url()?>faq/cover.jpg')">

			<div class="overlay">
				<div class="cover_titre">
					<h1><?= $titre ?></h1>
					<h3><?= $sous_titre ?></h3>
				</div>
			</div>

		</section>

		<section class="content">

			<section class="faqs">

				<?php foreach ($faqs as $faq): ?>

				<article class="faq">

					<h3 class="faq_question"><?= $faq['question'] ?></h3>
					<p class="faq_separation"><img src="<?=img_url()?>title_bottom.svg" alt=""></p>
					<p class="faq_reponse"><?= nl2br($faq['reponse']) ?></p>	

				</article>
			
			<?php endforeach; ?>
				
			</section>

		</section>