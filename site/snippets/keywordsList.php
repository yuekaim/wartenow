<div class="keywords_list">

    <?php for ($i = 0; $i < 3; $i++): ?>
      <div class="tags"></div>
    <?php endfor; ?>

    <div class="tags real_tags">All</div>
    <div class="tags real_tags">Recently</div>
    <div class="tags real_tags">Upcoming</div>

    <?php
      $articles = $kirby->collection('posts');
      $tags = $articles->pluck('keywords', ',', true);
      $tags = array_unique($tags);
    ?>

    <?php foreach($tags as $tag): ?>
      <div class="tags real_tags"><?php echo html($tag) ?></div>
    <?php endforeach ?>

    <?php for ($i = 0; $i < 50; $i++): ?>
      <div class="tags"></div>
    <?php endfor; ?>

</div>
