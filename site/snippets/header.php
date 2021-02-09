<html>
	<head>

			<title>Wartenau</title>

			<?= css('assets/css/index.css'); ?>
			<?= css('@auto'); ?>

	</head>
<body>

	<h1>
		<a href="<?= $site->url() ?>">
			<?= $site->title() ?>
		</a>
	</h1>

	<h3>Authors</h3>
	<nav>
		<?php foreach( $pages as $child ): ?>
			<a href="<?= $child->url() ?>"><?= $child->title() ?></a>
		<?php endforeach; ?>
	</nav>
