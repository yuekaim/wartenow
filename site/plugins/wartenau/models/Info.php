<?php

class InfoPage extends Page {

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
                'content' => $this->text()->toBlocks()->toHtml(),
                'team' => $this->team()->yaml(),
            ]);
        }

        return $json;
    }

}
