<?php

namespace Modules\LessonApi\ThirdParty\Providers;

use Modules\LessonApi\Contracts\Provider as ProviderContract;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

abstract class AbstractProvider implements ProviderContract 
{
    /**
     * The HTTP request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * The redirect URL.
     *
     * @var string
     */
    protected $redirectUrl;

    /**
     * Create a new provider instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $clientSecret
     * @param  string  $redirectUrl
     * @return void
     */
    public function __construct(Request $request, $redirectUrl)
    {
        $this->request = $request;
        $this->redirectUrl = $redirectUrl;
    }
    /**
     * Execute request to library party
     */
    public function request()
    {
        return $this->redirectUrl;
    }

    /**
     * Get User data from third party
     */
    public function user()
    {
        $response = $this->getAccessTokenRespone();
        $user = $this->mapUserToObject($this->getUserByToken($token = Arr::get($response, 'access_token')));

        return $user->setToken($token);
    }

    /**
     * Get the access token response for the given code.
     *
     * @param  string  $code
     * @return array
     */
    abstract public function getAccessTokenRespone();

    /**
     * Get the raw user for the given access token.
     *
     * @param  string  $token
     * @return array
     */
    abstract protected function getUserByToken($token);

    /**
     * Map the raw user array to a Socialite User instance.
     *
     * @param  array  $user
     * @return \Laravel\Socialite\Two\User
     */
    abstract protected function mapUserToObject(array $user);
}