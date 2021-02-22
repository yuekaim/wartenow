<?php

$currentFilter = param('filter');

$filters = array_merge([
	'Upcoming',
	'Recently'
], $kirby->collection('posts')->pluck('keywords', ',', true) );

?>
<div class="keywords_list">

    <?php for ($i = 0; $i < 3; $i++): ?>
		<div class="tags"></div>
    <?php endfor; ?>

	<a <?php e(!$currentFilter, 'id="selected"') ?> class="tags real_tags" href="<?= $site->url() ?>"><span> ● </span>All</a>

    <?php foreach($filters as $filter):

		// check if one of the filter-words is currently active
		$active = $filter === $currentFilter;

		// create the href url for the filter link
		$url = url('/', ['params' => ['filter' => $filter]]);

		?>

		<a <?php e( $active, 'id="selected"') ?> class="tags real_tags" href="<?= $url ?>">
			<span> ● </span><?= html($filter) ?>
		</a>

    <?php endforeach ?>

    <?php for ($i = 0; $i < 50; $i++): ?>
		<div class="tags"></div>
    <?php endfor; ?>

</div>
