<?php

namespace Modules\LessonApi\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

use Modules\LessonApi\Repositories\TagRepository;
use Modules\LessonApi\Resources\TagResource;
use Modules\LessonApi\Tag;
use Modules\LessonApi\Cacheable\TagCacheable;

class TagService {

    protected $tags;

    public function __construct(
        TagRepository $tags
        ){
        $this->tags = $tags;
    }

    /**
     * get all data
     * 
     * @param 
     * @return array
     */
    public function all(){
        $page = request()->get('page') ? : 1;

        $key = 'tags.all.page.'. $page;

        $tagCache = new TagCacheable($key);
        
        $tags = $tagCache->getDataWithPaginate();

        return $tags;
    }
}