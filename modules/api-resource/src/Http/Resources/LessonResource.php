<?php

namespace Modules\LessonApi\Resources;

use Modules\LessonApi\Resources\TagResource as Tag;
use Illuminate\Http\Resources\Json\Resource;

class LessonResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'body'      => $this->body,
            'tags'      => Tag::collection($this->tags),
        ];
    }
}
