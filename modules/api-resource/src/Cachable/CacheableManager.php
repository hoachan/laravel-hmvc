<?php

namespace Modules\LessonApi\Cacheable;

use Illuminate\Http\Resources\Json\Resource;
use Modules\LessonApi\Repositories\Repository;
use Illuminate\Support\Facades\Cache;

abstract class CacheableManager {

    protected $key;

    /**
     * process cache for saving to redis cache
     * 
     * @param $key : key of cacheable object
     */
    public function __construct($key){
        $this->key = $key;
    }

    /**
     * process cache with fetch all data that using paginate
     * 
     * @return array
     */

    public function getDataWithPaginate(){

        if ($this->has($this->key)){
            return $this->get($this->key);
        }

        $values = $this->getValuePaginate();

        $this->put($this->key, $values);
        
        return $values;
    }

    /**
     * return true the current key has existed in cache system
     * @param $key : tring
     * @return boolean
     */
    public function has($key){
        return Cache::store('redis')->has($key) ? true :false;
    }


    /**
     * put value to cache system
     * 
     * @param $key : key of redis
     * @param $value : int | string | array
     * @param $time : min * min
     * @return void
     */
    public function put($key, $value, $time = 60 * 60){
        Cache::store('redis')->put($key, $value, $time);
    }

    /**
     * get value based on key value
     * @param $key : string
     * @return string - json
     */

    public function get($key){
        return Cache::store('redis')->get($key);
    }


    /**
     * Get the value of key
     */ 
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of key
     *
     * @return  self
     */ 
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * return array of obj eloquent 
     * 
     * @retun array of Eloquent
     */
    abstract public function getValuePaginate();
}