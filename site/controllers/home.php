<?php

return function ($kirby, $page) {

    // get all posts
    $posts = $kirby->collection('posts');

    // filter posts
    if($filter = param('filter') ){

        // get current timestamp
        $now = time();

        if( $filter === 'Recently' ){
            // get posts which past date
            $posts = $posts->filter(function($child) use($now){
                return $child->date()->toDate() < $now;
            });

        } else if( $filter === 'Upcoming' ){
            // get posts which future date
            $posts = $posts->filter(function($child) use($now){
                return $child->date()->toDate() > $now;
            });

        } else {
            // filter posts by dynamic keyword
            $posts = $posts->filterBy('keywords', $filter, ',');

        }

    } else {
        $filter = false;
    }

    // pass posts to template
    return [
        'posts' => $posts,
        'filter' => $filter
    ];
};
