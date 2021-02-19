<ul class="posts">
    <?php foreach( $kirby->collection('posts') as $post ): ?>
        <li class="post">

            <a href="<?= $post->url() ?>">

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
        </li>
    <?php endforeach ?>
</ul>