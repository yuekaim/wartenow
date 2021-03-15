<?php

class BlocksController {

	protected $blocks;

	public function __construct(\Kirby\Cms\Blocks $blocks)
	{
		$this->blocks = $blocks;
	}

	public function controller_text(\Kirby\Cms\Block $block ){
		return [
			'text' => $block->text()->kirbytext()->value(),
			'footnote' => $block->footnote()->kirbytextInline()->value()
		];
	}
	public function controller_textfootnote(\Kirby\Cms\Block $block ){
		return $this->controller_text( $block );
	}

	public function controller_interview(\Kirby\Cms\Block $block ){
		return [
			'interviewee' => $block->interviewee()->value(),
			'text' => $block->text()->kirbytext()->value()
		];
	}

	public function controller_image(\Kirby\Cms\Block $block ){
		$caption = false;

		if( $block->caption()->isNotEmpty() ){
			$caption = $block->caption()->html()->value();
		}

		if( $image = $block->image()->toFile() ){
			if( $caption === false && $image->caption()->isNotEmpty() ){
				$caption = $image->caption()->html()->value();
			}
			$image = $image->json();
		}

		return [
			'image' => $image,
			'caption' => $caption
		];
	}

	public function controller_images(\Kirby\Cms\Block $block ){
		return [
			'images' => $block->images()->toFiles()->json()
		];
	}
	public function controller_slider(\Kirby\Cms\Block $block ){
		return $this->controller_images( $block );
	}

	public function blockData(\Kirby\Cms\Block $block ){

		$method = 'controller_'.$block->type();

		if( method_exists( $this, $method ) ){
			return $this->{$method}( $block );
		}
		return '';

		return $block->content()->toArray();
	}

	public function data(): array
	{
		$json = [];

		foreach( $this->blocks as $block ){
			if( $block->isEmpty() || $block->isHidden() ){
				continue;
			}
			$json[] = [
				'content' => $this->blockData( $block ),
				'type' => $block->type()
			];
		}

		return $json;
	}

}

Kirby::plugin('moritzebeling/json-blocks', [

	'fieldMethods' => [
		'jsonBlocks' => function ($field): array {

			return ( new BlocksController( $field->toBlocks() ) )->data();

        },
	],

]);
