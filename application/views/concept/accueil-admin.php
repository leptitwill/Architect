		<section class="content-admin">

			<h1 class="titre"><?= $titre ?></h1>

			<label>Avantages liés à la page concept</label>
			<table>
				<?php foreach ($avantages as $avantage): ?>
					<tr>
						<td>
							<p><?= $avantage['nom'] ?></p>
						</td>
						<td>
							<img src="<?=img_url()?>avantage/<?= $avantage['icone'] ?>" alt="<?= $avantage['nom'] ?>" >
						</td>
					</tr>
				<?php endforeach ?>
				<tr>
					<td>
						<a href="<?= base_url("admin/avantage"); ?>">Gérer les avantages</a>
					</td>
				</tr>
			</table>

		</section>
