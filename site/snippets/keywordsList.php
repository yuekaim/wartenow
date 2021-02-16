<div class="keywords">
    <div class="tags">All</div>
    <div class="tags">Recently</div>
    <div class="tags">Upcoming</div>

    <?php
      $articles = $kirby->collection('posts');
      $tags = $articles->pluck('keywords', ',', true);
      $tags = array_unique($tags);
    ?>

    <?php foreach($tags as $tag): ?>
      <div class="tags"><?php echo html($tag) ?></div>
    <?php endforeach ?>
</div>
