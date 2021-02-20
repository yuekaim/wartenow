<div class="posts">

  <?php
  $articles = $kirby->collection('posts');
  $tags = $articles->pluck('tags', ',', true);
  if($tag = param('tag')) {
    $articles = $articles->filterBy('keywords', $tag, ',');
  } ?>
  <?php foreach( $articles as $post ): ?>

      <a class="post" href="<?= $post->url() ?>">

          <?php if( $image = $post->titleImage()->toFile() ): ?>
              <figure>
                  <img src="<?= $image->url() ?>" />
              </figure>
          <?php endif ?>

          <h2><?= $post->title() ?></h2>

          <?php if( $post->authors()->isNotEmpty() ): ?>
              <p>By <?= $post->authors() ?></p>
          <?php endif ?>

      </a>
    <?php endforeach ?>

</ul>
