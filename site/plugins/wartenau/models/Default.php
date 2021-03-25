<?php

class DefaultPage extends Page {

    public function authors( bool $full = false ) {

        $json = [];
        foreach( $this->content()->authors()->toStructure() as $author ){
            if( $full ){
                $json[] = [
                    'name' => $author->name()->value(),
                    'image' => $author->image()->json('file'),
                    'link' => $author->link()->value(),
                    'text' => $author->intro()->kirbytext()->value(),
                ];
            } else {
                $json[] = $author->name()->value();
            }
        }
        if( !$full ){
            return implode(', ',$json);
        }
        return $json;
    }

    public function json( bool $full = false ): array {
        $json = parent::json( $full );

        // abstract dataset for list of posts
        $json = array_merge($json, [
            'subtitle' => $this->subtitle()->value(),
            'category' => $this->parent()->uid(),
            'date' => $this->date()->toDate('d.m.Y'),
            'image' => $this->titleImage()->json('image'),
            'color' => $this->color()->value(),
            'issue' => $this->issue()->value(),
            'authors' => $this->authors( $full ),
        ]);

        if( $full === true ){
            // full dataset for detailed view
            $json = array_merge( $json, [
                'content' => $this->text()->toBlocks()->toHtml(),
                'abstract' => $this->abstract()->value(),
                'footnotes' => $this->footnotes()->kirbytext()->value(),
                'downloads' => $this->downloads()->json('files'),
                'links' => $this->links()->yaml(),
                'attributes' => $this->attributes()->yaml(),
                'keywords' => $this->keywords()->split(),
            ]);
        }

        return $json;
    }

}
