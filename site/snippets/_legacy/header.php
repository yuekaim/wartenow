<!doctype html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title><?= $page->title() ?> ● <?= $site->title() ?></title>

	<?php
	echo css('assets/css/index.css');
	/* automatically load css for the current template */
	echo css('@auto'); ?>

</head>
<body>
<body>

	<div id="header">
		<h1>
			<a href="<?= $site->url() ?>">
				<?= $site->title() ?>
			</a>
		</h1>

		<?php $info = $site->find('info') ?>
		<a href="<?= $info->url() ?>">
			<?= $info->title() ?>
		</a>
	</div id="header">

	<?php snippet('keywordsList'); ?>
