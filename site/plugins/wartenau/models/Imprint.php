<?php

class ImprintPage extends Page {

    public function json( bool $full = false ): array {
        $json = parent::json( $full );

        if( $full === true ){
            $json = array_merge( $json, [
                'logos' => $this->images()->json(),
            ]);
        }

        return $json;
    }

}
