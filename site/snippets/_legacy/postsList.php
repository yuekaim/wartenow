<?php
/*
* The list of $posts is created in the controller `controllers/home.php`
*/

?>
<div class="posts">

<<<<<<< HEAD
    <?php foreach( $posts as $post ): ?>
          <div class="post">
            <a href="<?= $post->url() ?>">
              <!-- test with random svg -->
              <img id="test"
              src="<?= $kirby->url('assets') ?>/shapes/shape1.svg"
              vector-effect="non-scaling-stroke;"/>


              <!-- end of svg test -->
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
          </div>

    <?php endforeach ?>


    <style>

   #test{
      position: absolute;
      transform:translate(-45%, -40%);
      overflow: scroll;
      width: 60%;
      z-index: -1000;
      pointer-events: none;
    }

    #test p{
      position: absolute;
      top: -200px;
      width: 30%;
    }
    .post{
      border:none;
      background-color: #00000000;
      padding: 100px;
    }
    .post img{
      width: 50px;
    }
    .posts{
      top: 20vh;
      left: 30vw;
      max-width: 70vw;
    }

    </style>



</ul>
