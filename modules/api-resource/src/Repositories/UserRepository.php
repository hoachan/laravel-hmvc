<?php

namespace Modules\LessonApi\Repositories;

class UserRepository {

    /**
     * 
     * Get all of User
     * @return \Laravel\User| null
     */

    public function getAllUser(){
        return User::all();
    }

}