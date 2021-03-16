<?php

require_once 'models/Info.php';
require_once 'models/Default.php';

Kirby::plugin('kimcleomoritz/wartenau', [

	'pageModels' => [
		'default' => 'DefaultPage',
		'info' => 'InfoPage'
	],

	'siteMethods' => [
        'posts' => function (): Kirby\Cms\Pages {
			return $this->page('posts')->children()->listed();
        },
        'categories' => function (): array {
			return $this->posts()->pluck('categories',',',true);
        }
	],

	'pageMethods' => [

	],

	'pagesMethods' => [

	],

	'fileMethods' => [

	],

	'filesMethods' => [

	],

]);
