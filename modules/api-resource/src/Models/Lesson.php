<?php

namespace Modules\Api;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    
    protected $fillable = [
        'title', 'body'
    ];

    protected $hidden = ['updated_at'];
}
