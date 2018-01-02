<?php

namespace Modules\LessonApi;

class LessonTransfomer  extends Transformer{

    /**
     * Transform data to hoping json
     *  @param  \App\Lesson  $lessons
     */

    public function transform($lesson){

        return [
            'title_of_lesson'   => $lesson['title'],
            'body'              => $lesson['body'],
            'active'            => (Boolean)$lesson['some_bool'],
        ];
    }
}