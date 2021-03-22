<?php

class DefaultPage extends Page {

    public function jsonAuthors(): array {
        $json = [];
        foreach( $this->authors()->toStructure() as $author ){
            $json[] = [
                'name' => $author->name()->value(),
                'image' => $author->image()->json('file'),
                'link' => $author->link()->value(),
                'text' => $author->intro()->kirbytext()->value(),
            ];
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
            'color' => $this->color()->toColor('hex')
        ]);

        if( $full === true ){
            // full dataset for detailed view
            $json = array_merge( $json, [
                'content' => $this->text()->toBlocks()->toHtml(),
                'footnotes' => $this->footnotes()->kirbytext()->value(),
                'authors' => $this->jsonAuthors(),
                'downloads' => $this->downloads()->json('files'),
                'links' => $this->links()->yaml(),
                'attributes' => $this->attributes()->yaml(),
                'keywords' => $this->keywords()->split(),
            ]);
        }

        return $json;
    }

}
