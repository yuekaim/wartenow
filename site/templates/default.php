<?php snippet('header'); ?>
<?php snippet('keywordsList'); ?>

<article>
	<header>
		<h1><?= $page->title() ?></h1>
		<p class="date"><?= $page->date() ?></p>
	</header>

	<main>
		<?= $page->text()->kirbytext() ?>
	</main>

	<ul class="authors">
		<?php foreach( $page->authors()->split() as $author ): ?>
			<li><?= $author ?></li>
		<?php endforeach ?>
	</ul>
	<ul class="keywords">
		<?php foreach ($page->keywords()->split() as $keyword): ?>
			<li><?= $keyword ?></li>
		<?php endforeach ?>
	</ul>


</article>

<?php snippet('footer');
