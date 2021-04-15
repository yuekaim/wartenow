<?php

class InfoPage extends Page {

    public function jsonTeam(): array {
        $json = [];
        foreach( $this->team()->toStructure() as $author ){
            $json[] = [
                'name' => $author->name()->value(),
                'image' => $author->image()->json('image'),
                'link' => $author->link()->value(),
                'text' => $author->intro()->kirbytext()->value(),
            ];
        }
        return $json;
    }

    public function json( bool $full = false ): array {
        $json = parent::json( $full );

        if( $full === true ){
            // full dataset for detailed view
            $json = array_merge( $json, [
                'content' => $this->text()->toBlocks()->toHtml(),
                'team' => $this->jsonTeam(),
            ]);
        }

        return $json;
    }

}
