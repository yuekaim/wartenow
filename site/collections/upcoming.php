<?php

return function ($kirby) {

    $now = time();
    return $kirby->collection('posts')->filter(function($child) use($now){
        return $child->date()->toDate() > $now;
    });

};
