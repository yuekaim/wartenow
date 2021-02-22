<?php
/*
* The list of $posts is created in the controller `controllers/home.php`
*/

?>
<div class="posts">

    <?php foreach( $posts as $post ): ?>

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
