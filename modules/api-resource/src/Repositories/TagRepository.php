<?php

namespace Modules\LessonApi\Repositories;

use Modules\LessonApi\Tag;

class TagRepository implements Repository {

    /**
     * 
     * Get all of Tag
     * @return \Laravel\User| null
     */

    public function all(){
        return Tag::all();
    }

    /**
     * 
     * Get a Tag by lesson id
     * @param : id int
     * @return : Modules\LessonApi\Lesson | null
     */

    public function find($id){
        return Tag::find($id);
    }

    /**
     * Pagination with fetch all Lesson data
     * @param int $limit
     * @return Illuminate\Pagination\LengthAwarePaginator
     */

    public function paginate($limit = 3){
        return Tag::paginate($limit);
    }
}