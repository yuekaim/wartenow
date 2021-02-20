<div class="keywords_list">

    <?php for ($i = 0; $i < 3; $i++): ?>
      <div class="tags"></div>
    <?php endfor; ?>

    <a <?php if($page->url() == $site->url()) {echo 'id="selected"';} ?>
    class="tags real_tags" href="<?= $site->url() ?>"><span> ● </span>All</a>
    <a class="tags real_tags"><span> ● </span>Recently</a>
    <a class="tags real_tags"><span> ● </span>Upcoming</a>

    <?php
      $articles = $kirby->collection('posts');
      $tags = $articles->pluck('keywords', ',', true);
      $tags = array_unique($tags);
    ?>

    <?php foreach($tags as $tag): ?>
      <a <?php if($tag == param('tag')) {echo 'id="selected"';} ?> class="tags real_tags" href="<?= url('posts', ['params' => ['tag' => $tag]]) ?>">
        <span> ● </span><?= html($tag) ?>
      </a>
    <?php endforeach ?>

    <?php for ($i = 0; $i < 50; $i++): ?>
      <div class="tags"></div>
    <?php endfor; ?>

</div>
