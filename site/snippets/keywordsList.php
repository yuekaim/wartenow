<div class="keywords_list">
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
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

    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
    <div class="tags"></div>
</div>
