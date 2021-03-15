<?php

class DefaultPage extends Page {

    public function json( bool $full = false ): array {
        $json = parent::json( $full );

        $json = array_merge($json, [
            'subtitle' => $this->subtitle()->value(),
            'categories' => $this->categories()->split()
        ]);

        return $json;
    }

}
