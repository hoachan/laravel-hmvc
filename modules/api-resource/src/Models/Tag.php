<?php

namespace Modules\LessonApi;

use Modules\LessonApi\Lesson;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $hidden = [];

    public function lessons(){

        // any post may have many tags
        //any tags may be applied any post
        return $this->belongsToMany(Lesson::class);

    }
}
