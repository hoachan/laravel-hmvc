<?php

namespace Modules\LessonApi;

use Modules\LessonApi\Tag;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    
    protected $fillable = [
        'title', 'body', 'some_bool'
    ];

    protected $hidden = ['updated_at'];

    public function tags (){

        // any post may have many tags
        //any tags may be applied any post
        return $this->belongsToMany(Tag::class);

    }
}
