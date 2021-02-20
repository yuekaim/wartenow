<?php snippet('header'); ?>
<?php snippet('keywordsList'); ?>

<article>
	<header>
		<h1><?= $page->title() ?></h1>
		<p class="date"><?= $page->date() ?></p>
	</header>

	<?php snippet('postContent'); ?>


	<div class="notes">

		<?php if( $image = $page->titleImage()->toFile() ): ?>
			<figure>
				<img id="titleImg" src="<?= $image->url() ?>" />
			</figure>
		<?php endif ?>

		<ul class="authors">
			<p>Author(s)</p>
			<?php foreach( $page->authors()->split() as $author ): ?>
				<li><?= $author ?></li>
			<?php endforeach ?>
		</ul>

		<div class="downloadGroup">
			<?php
			$files =  $page->downloads()->toFiles();
			foreach($files as $file): ?>
				<a class="downloads" href="<?= $file->url() ?>" target="_blank"><?= $file->filename() ?></a>
			<?php endforeach ?>
		</div>

		<ul class="keywords">
			<?php foreach ($page->keywords()->split() as $keyword): ?>
				<li><?= $keyword ?></li>
			<?php endforeach ?>
		</ul>
	</div>


</article>

<?php snippet('footer');
