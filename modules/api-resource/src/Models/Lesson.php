<?php

namespace Modules\LessonApi;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    
    protected $fillable = [
        'title', 'body', 'some_bool'
    ];

    protected $hidden = ['updated_at'];
}
