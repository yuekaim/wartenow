<?php

/*
* create a $pages list from all posts
*/

return function ($site) {

    return $site->find('posts')->children()->listed()->flip();

};
