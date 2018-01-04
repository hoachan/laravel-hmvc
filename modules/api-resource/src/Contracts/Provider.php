<?php

namespace Modules\LessonApi\Contracts;

interface Provider
{
    /**
     * Redirect the user to the authentication page for the provider.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function request();

    /**
     * Get the User instance for the authenticated user.
     *
     * @return \Modules\LessonApi\Contracts\User
     */
    public function user();
}
