<?php

namespace Modules\LessonApi\Contracts;

interface User
{
    /**
     * Get the unique identifier for the user.
     *
     * @return string
     */
    public function getId();

    /**
     * Get the full name of the user.
     *
     * @return string
     */
    public function getName();

}