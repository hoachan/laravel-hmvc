<?php 

namespace Modules\LessonApi\Services;

use Illuminate\Support\Manager;
use Modules\LessonApi\Contracts\Factory;

use Modules\LessonApi\ThirdParty\Providers\FacebookProvider;
use Modules\LessonApi\ThirdParty\Providers\GoogleProvider;

/**
 * defining to get all data record
 */
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Modules\LessonApi\Repositories\LessonRepository;
use Modules\LessonApi\Lesson;

class LessonApiService extends Manager implements Factory {

    /**
     * Get a driver instance.
     *
     * @param  string  $driver
     * @return mixed
     */
    public function with($driver)
    {
        return $this->driver($driver);
    }

    /**
     * Build an get data from third party provider instance.
     *
     * @param  string  $provider
     * @param  array  $config
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    public function buildProvider($provider, $config)
    {
        return new $provider(
            $this->app['request'], 
            $config
        );
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Modules\LessonApi\ThirdParty\Provider\AbstractProvider
     */
    protected function createFacebookDriver()
    {
        $config = 'facebook day ne';

        return $this->buildProvider(
            FacebookProvider::class, $config
        );
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createGoogleDriver()
    {
        $config = 'google day ne';

        return $this->buildProvider(
            GoogleProvider::class, $config
        );
    }

    /**
     * Get the default driver name.
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        throw new InvalidArgumentException('No Socialite driver was specified.');
    }

    /**
     * get all data lesson
     * 
     * @param
     * @return array json
     */

    public function getAll(){

        // if ($value = Redis::get('lessons.all')){
        //     return $value;
        // }

        // $lessons = Lesson::all();

        // Redis::set('lessons.all', $lessons);
        // return $lessons;
        $test = [
            'favorite'  => 20,
            'start'     => 3,
        ];
        Cache::store('redis')->put('users.1.info', $test, 10);

        $andy = Cache::store('redis')->get('users.1.info');

        return Cache::store('redis')->remember('lessons.all', 60 * 60, function(){
            return Lesson::all();
        });
    }

}