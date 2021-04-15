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

    public function isSoon(): bool {
        if( $this->date()->isEmpty() ){
            return false;
        }
        $month = 60 * 60 * 24 * 30;
        $date = $this->date()->toDate();
        return time() < $date && time() + $month > $date;
    }

    public function isNew(): bool {
        if( $this->date()->isEmpty() ){
            return false;
        }
        $month = 60 * 60 * 24 * 30;
        $date = $this->date()->toDate();
        return time() > $date && time() - $month < $date;
    }

    public function beautiful(){
        if( $this->content()->beautiful()->isNotEmpty() ){
            return $this->content()->beautiful();
        }
        return $this->title();
    }

    public function blockContent(){
        $html = '';
        $startAt = 1;
        $notes   = [];
        foreach($this->text()->toBlocks() as $block){
            if(in_array($block->type(), ['text', 'markdown'])){
                // we get the text with footnotes references but no bottom footnotes container
                $text = $block->text()->withoutBlocksFootnotes($startAt);
                $text = preg_replace( '/\s([^\s]*?\s?<sup.+?<\/sup>)/', ' <span class="nbsp">$1</span>', $text );
                // instead, we get an array of the block's footnotes, and append it to our $notes array
                $notesArr = $block->text()->onlyBlocksFootnotes($startAt);
                if($notesArr !== '') {
                    foreach($notesArr as $f) { $notes[] = $f; }
                }
                // the first note of the next block will now start at (number of current notes + 1)
                $startAt = count($notes) + 1;
                $html .= $text;
            } else {
                $html .= $block;
            }
        }
        return $html;
    }

    public function footnotes(){
        $startAt = 1;
        $notes   = [];
        foreach($this->text()->toBlocks() as $block){
            if(in_array($block->type(), ['text', 'markdown'])){
                $notesArr = $block->text()->onlyBlocksFootnotes($startAt);
                if($notesArr !== '') {
                    foreach($notesArr as $f) {
                        $notes[] = $f;
                    }
                }
                $startAt = count($notes) + 1;
            }
        }
        return $notes;
    }


    public function json( bool $full = false ): array {
        $json = parent::json( $full );

        // abstract dataset for list of posts
        $json = array_merge($json, [
            'title' => $this->beautiful()->value(),
            'subtitle' => $this->subtitle()->value(),
            'category' => $this->parent()->uid(),
            'date' => $this->date()->toDate('d.m.Y'),
            'image' => $this->titleImage()->json('image'),
            'color' => $this->color()->value(),
            'issue' => $this->issue()->value(),
            'authors' => $this->authors( $full ),
            'new' => $this->isNew(),
            'soon' => $this->isSoon(),
        ]);

        if( $full === true ){
            // full dataset for detailed view
            $json = array_merge( $json, [
                'content' => $this->blockContent(),
                'abstract' => $this->abstract()->value(),
                'footnotes' => $this->footnotes(),
                'downloads' => $this->downloads()->json('files'),
                'links' => $this->links()->yaml(),
                'attributes' => $this->attributes()->yaml(),
                'keywords' => $this->keywords()->split(),
            ]);
        }

        return $json;
    }

}
