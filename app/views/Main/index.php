<div class="container">
	<?php if (!empty($posts)) { ?>
		<div class="accordion" id="accordionExample">
			<?php foreach ($posts as $key => $post) { ?>
				<?php if ($key === 0) { ?>
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading<?= $key ?>">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
								<?= $post['title']; ?>
							</button>
						</h2>
						<div id="collapse<?= $key ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?= $key ?>" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<?= $post['text']; ?>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading<?= $key ?>">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key ?>" aria-expanded="false" aria-controls="collapse<?= $key ?>">
								<?= $post['title']; ?>
							</button>
						</h2>
						<div id="collapse<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $key ?>" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<?= $post['text']; ?>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	<?php } ?>
</div>