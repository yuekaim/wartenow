<?php

Kirby::plugin('moritzebeling/headless', [

	'options' => [
		'cache' => false,
		'expires' => 1440,
		'thumbs' => [
			'thumb' => ['width' => 426],
			'srcset' => [640, 854, 1280, 1920],
		],
	],

	'controllers' => [
        'global' => require 'controllers/global.php',
        'site' => require 'controllers/site.php',
    ],

	'routes' => [
		[
			'pattern' => '(:all)/print.json',
			'language' => '*',
			'action'  => function ( $language, $id ) {

				$lang = kirby()->language()->code();
				$url = $lang . '/' . $id . '.json';

				// return $url;

				return go( $url );

			}
		],
		[
			'pattern' => 'posts.json',
			'language' => '*',
			'action'  => function ( $language ) {

				return kirby()->site()->json();

			}
		]
	],

	// json() methods for $site $page $pages $file $files
	// extend them to your needs here or using mage models

	'siteMethods' => [
        'json' => function ( bool $full = false ): array {

            $json = [
				'title' => $this->title()->value(),
				'categories' => $this->categories()->json(),
				'pages' => $this->children()->filterBy('intendedTemplate','in',['info'])->json(),
				'posts' => $this->posts()->json(),
				'imprint' => $this->page('impressum')->json()
			];

			return $json;
        }
	],

	'pageMethods' => [
		'json' => function ( bool $full = false ): array {

			$lang = $this->kirby()->language();

			$json = [
				'title' => $this->title()->value(),
				'path' => '/'.$lang.'/'.$this->uri(),
				'template' => $this->intendedTemplate()->name()
			];

			if( $full && $this->text()->isNotEmpty() ){
				$json['text'] = $this->text()->value();
				$json['translations'] = [
					'de' => '/'.'de/'.$this->uri('de'),
					'en' => '/'.'en/'.$this->uri('en')
				];
			}

			return $json;
		}
	],

	'pagesMethods' => [
        'json' => function ( bool $full = false ): array {
			$json = [];
			foreach($this as $page) {
				$json[] = $page->json( $full );
			}
			return $json;
        }
	],

	'fileMethods' => [
		'json' => function ( string $size = 'l' ): array {

			$json = [
				'alt' => $this->alt()->value(),
				'url' => $this->url(),
			];

			if( !$size || !$this->isResizable() || $this->extension() === 'gif' ){
				return $json;
			}

			$sizes = option( 'thumbs.srcsets.'.$size,
				option('moritzebeling.headless.thumbs.srcset') );
			$srcset = [];
			foreach( $sizes as $width ){
				if( is_array( $width ) ){
					$url = $this->thumb( $width )->url();
					$width = $width['width'];
				} else {
					$url = $this->thumb(['width' => $width])->url();
				}
				$srcset[] = [
					'width' => $width,
					'url' => $url
				];
			}

			return array_merge($json,[
				'url' => $this->thumb( option('moritzebeling.headless.thumbs.thumb') )->url(),
				'caption' => $this->caption()->kirbytextinline()->value(),
				'srcset' => $srcset
			]);
        }
	],

	'filesMethods' => [
        'json' => function ( string $size = 'l' ): array {
			$json = [];
			foreach($this as $file) {
				$json[] = $file->json( $size );
			}
			return $json;
        }
	],

	'fieldMethods' => [
        'json' => function ( $field, string $type = 'text' ) {
			if( $field->isEmpty() ){
				return false;
			}
			switch ($type) {
				case 'image':
				case 'file':
					if( $file = $field->parent()->file( $field->yaml()[0] ) ){
						$file = $file->json();
					}
					return $file;
					break;
				case 'images':
				case 'files':
					$files = [];
					foreach( $field->yaml() as $file ){
						if( $file = $field->parent()->file( $file ) ){
							$files[] = $file->json();
						}
					}
					return $files;
					break;
				case 'kirbytext':
					return $field->kirbytext()->value();
					break;
				case 'blocks':
					return $field->toBlocks()->toHtml();
					break;
				default:
					return $field->value();
					break;
			}
        },
	],

]);
