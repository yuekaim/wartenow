<?php snippet('header'); ?>

<ul class="posts">
    <?php foreach( $site->find('posts')->children()->listed() as $post ): ?>
        <li class="post">
            <a href="<?= $post->url() ?>">

                <?php if( $image = $post->titleImage()->toFile() ): ?>
                    <img src="<?= $image->url() ?>" />
                <?php endif ?>

                <h2><?= $post->title() ?></h2>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<?php snippet('footer');
