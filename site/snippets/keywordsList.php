<div class="keywords">

    <?php
      $articles = $kirby->collection('posts');
      $tags = $articles->pluck('keywords', ',', true);
      $tags = array_unique($tags);
    ?>

    <?php foreach($tags as $tag): ?>
      <button><?php echo html($tag) ?></button>
    <?php endforeach ?>
</div>
