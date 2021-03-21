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
			return $this->categories()->children()->listed();
        },
        'categories' => function (): Kirby\Cms\Pages {
			return $this->children()->listed()->filterBy('intendedTemplate','category');
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
