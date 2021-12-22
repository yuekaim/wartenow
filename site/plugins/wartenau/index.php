<?php

require_once 'models/Info.php';
require_once 'models/Category.php';
require_once 'models/Default.php';
require_once 'models/Imprint.php';

Kirby::plugin('kimcleomoritz/wartenau', [

	'pageModels' => [
		'default' => 'DefaultPage',
		'info' => 'InfoPage',
		'category' => 'CategoryPage',
		'imprint' => 'ImprintPage',
	],

	'siteMethods' => [
        'posts' => function (): Kirby\Cms\Pages {
			return $this->categories()->children()->listed();
        },
        'categories' => function (): Kirby\Cms\Pages {
			return $this->children()->listed()->filterBy('intendedTemplate','category');
        }
	],

]);
