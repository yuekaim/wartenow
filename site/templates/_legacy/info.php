<?php snippet('header'); ?>

<header>

	<h1><?= $page->title() ?></h1>

</header>

<main>
	<?= $page->text()->kirbytext(); ?>
</main>

<?php if( $team = $page->team()->toStructure() ): ?>
	<ul class="team">
		<?php foreach( $team as $person ): ?>
			<?php $image = $person->image()->toFile(); ?>
			<li>
				<img src="<?= $image->url() ?>" />
				<h3><?= $person->name() ?></h3>
				<p><?= $person->intro()->kirbytext() ?></p>
			</li>
		<?php endforeach ?>
	</ul>
<?php endif ?>

<?php snippet('footer');
