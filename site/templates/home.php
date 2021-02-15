<?php snippet('header'); ?>

<ul class="posts">
    <?php foreach( $site->find('posts')->children()->listed() as $post ): ?>
        <li class="post">
            <a href="<?= $post->url() ?>">
                <h2><?= $post->title() ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<?php snippet('footer');
