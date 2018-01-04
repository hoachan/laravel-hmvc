<?php

namespace Modules\LessonApi\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\LessonApi\Contracts\Factory;

/**
 * @see \Modules\LessionApi\LessonApiService
 */
class LessonApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Factory::class;
    }
}