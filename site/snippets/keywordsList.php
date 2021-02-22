<?php

$tags = $kirby->collection('posts')->pluck('keywords', ',', true);
// $tags = array_unique($tags);

?>
<div class="keywords_list">

    <?php for ($i = 0; $i < 3; $i++): ?>
      <div class="tags"></div>
    <?php endfor; ?>

    <a <?php if($page->url() == $site->url()) {echo 'id="selected"';} ?>
    class="tags real_tags" href="<?= $site->url() ?>"><span> ● </span>All</a>
    <a <?php if('recently' == param('filter')) {echo 'id="selected"';} ?> class="tags real_tags" href="<?= url('/', ['params' => ['filter' => 'recently']]) ?>"><span> ● </span>Recently</a>
    <a <?php if('upcoming' == param('filter')) {echo 'id="selected"';} ?> class="tags real_tags" href="<?= url('/', ['params' => ['filter' => 'upcoming']]) ?>"><span> ● </span>Upcoming</a>

    <?php foreach($tags as $tag): ?>
      <a <?php if($tag == param('filter')) {echo 'id="selected"';} ?> class="tags real_tags" href="<?= url('/', ['params' => ['filter' => $tag]]) ?>">
        <span> ● </span><?= html($tag) ?>
      </a>
    <?php endforeach ?>

    <?php for ($i = 0; $i < 50; $i++): ?>
      <div class="tags"></div>
    <?php endfor; ?>

</div>
