<?php

namespace Modules\LessonApi\Contracts;

interface Factory {
    /**
     * Get an api provider implementation.
     *
     * @param  string  $driver
     * @return \Modules\LessonApi\Contracts\Provider
     */
    public function driver($driver = null);
}