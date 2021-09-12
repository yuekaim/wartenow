<?php

$images = $block->images()->toFiles();

?>
<figure class="gallery" data-count="<?= $images->count() ?>">
  <ul>
    <?php foreach ($images as $image): ?>
    <li>
      <?= $image ?>
      <?php if( $image->caption()->isNotEmpty() ): ?>
        <figcaption><?= $image->caption() ?></figcaption>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>
</figure>
