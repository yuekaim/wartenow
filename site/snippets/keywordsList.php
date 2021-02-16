<div class="keywords">
    <button>All</button>
    <button>Recently</button>
    <button>Upcoming</button>

    <?php
      $articles = $kirby->collection('posts');
      $tags = $articles->pluck('keywords', ',', true);
      $tags = array_unique($tags);
    ?>

    <?php foreach($tags as $tag): ?>
      <button><?php echo html($tag) ?></button>
    <?php endforeach ?>
</div>
