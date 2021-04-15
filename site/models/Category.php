<?php

class CategoryPage extends Page {

    public function posts(): Kirby\Cms\Pages {
        return $this->children()->listed();
    }

    public function json( bool $full = false ): array {
        $json = parent::json( $full );

        if( $full === true ){
            // full dataset for detailed view
            $json = array_merge( $json, [
                'text' => $this->text()->value(),
                'posts' => $this->posts()->json()
            ]);
        }

        return $json;
    }

}
