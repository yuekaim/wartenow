<?php snippet('header'); ?>

<article>

	<header>

		<h1><?= $page->title() ?></h1>

		<?php if( $page->date()->isNotEmpty() ): ?>
			<p class="date"><?= $page->date() ?></p>
		<?php endif ?>

		<?php if( $image = $page->titleImage()->toFile() ): ?>
			<figure>
				<img src="<?= $image->url() ?>" />
			</figure>
		<?php endif ?>

	</header>

	<main>
		<?= $page->text()->kirbytext(); ?>
	</main>

	<?php if( $page->authors()->isNotEmpty() ): ?>
		<ul class="authors">
			<?php foreach( $page->authors()->split() as $author ): ?>
				<li><?= $author ?></li>
			<?php endforeach ?>
		</ul>
	<?php endif ?>

</article>

<?php snippet('footer');
