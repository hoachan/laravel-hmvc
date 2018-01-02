<?php

namespace Modules\LessonApi;

class TagTransformer extends Transformer{

    /**
     * Transform data to hoping json
     *  @param  \App\Lesson  $lessons
     */

    public function transform($tag){

        return [
            'name'   => $tag['name'],
        ];
    }
}