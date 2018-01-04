<?php
namespace Modules\LessonApi\ThirdParty\Providers;

use Illuminate\Support\Arr;

use Modules\LessonApi\Common\User;

class GoogleProvider extends AbstractProvider
{


    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {
        $response = [
            'id'        => 1,
            'provider'  => 'google',
            'name'     => 'googler',
            'api_name'  => 'Oauth'
        ];

        return $response;
    }

    /**
     * Get Access Token from response
     * @return array
     */

    public function getAccessTokenRespone()
    {
        return [
            'provider'      => 'google',
            'access_token'  => 'google_token'
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        $avatarUrl = 'pictureUrl';

        return (new User)->setRaw($user)->map([
            'id' => $user['id'], 'nickname' => null, 'name' => isset($user['name']) ? $user['name'] : null,
            'email' => isset($user['email']) ? $user['email'] : null, 'avatar' => $avatarUrl.'?type=normal',
            'avatar_original' => $avatarUrl.'?width=1920',
            'profileUrl' => isset($user['link']) ? $user['link'] : null,
        ]);
    }
}