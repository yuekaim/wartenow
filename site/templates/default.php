<?php snippet('header'); ?>

<article>

	<header>
		<h1><?= $page->pageTitle() ?></h1>
		<p class="date"><?= $page->date() ?></p>
	</header>

	<main>
		<?= $page->mainText()->kirbytext(); ?>
	</main>

	<ul class="authors">
		<?php foreach( $page->author()->split() as $author ): ?>
			<li><?= $author ?></li>
		<?php endforeach ?>
	</ul>

	

</article>

<?php snippet('footer');
