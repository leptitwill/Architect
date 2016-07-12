		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<?php foreach ($emails_clients as $email_client): ?>

				<article class="avis">

					<p class="avis_question"><?= $email_client['email'] ?></p>

				</article>
			
			<?php endforeach; ?>

		</section>