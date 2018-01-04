<?php

namespace Modules\LessonApi\Repositories;

use Modules\LessonApi\Lesson;

class LessonRepository {

    /**
     * 
     * Get all of User
     * @return \Laravel\User| null
     */

    public function getAll(){
        return Lesson::all();
    }

    /**
     * 
     * Get a lesson by lesson id
     * @param : id int
     * @return : Modules\LessonApi\Lesson | null
     */

    public function find($id){
        return Lesson::find($id);
    }

    /**
     * Pagination with fetch all Lesson data
     * @param int $limit
     * @return Illuminate\Pagination\LengthAwarePaginator
     */

    public function paginate($limit){
        return Lesson::paginate($limit);
    }
}