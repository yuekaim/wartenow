<?php

class DefaultPage extends Page {

    public function json( bool $full = false ): array {
        $json = parent::json( $full );

        // abstract dataset for list of posts
        $json = array_merge($json, [
            'subtitle' => $this->subtitle()->value(),
            'categories' => $this->categories()->split(),
            'date' => $this->data()->toDate('d.m.Y'),
        ]);

        if( $full === true ){
            // full dataset for detailed view
            $json = array_merge( $json, [
                'info' => 'nice',
                'content' => $this->text()->toBlocks()->toHtml(),
            ]);
        }

        return $json;
    }

}
