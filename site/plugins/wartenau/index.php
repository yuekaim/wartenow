<?php

Kirby::plugin('kimcleomoritz/wartenau', [

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
