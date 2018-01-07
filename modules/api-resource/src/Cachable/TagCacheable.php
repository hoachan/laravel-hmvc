<?php

namespace Modules\LessonApi\Cacheable;

use Illuminate\Support\Facades\Cache;

use Modules\LessonApi\Repositories\TagRepository;
use Modules\LessonApi\Resources\TagResource;
use Modules\LessonApi\Common\TransformCommon;

class TagCacheable extends CacheableManager {

    /**
     * extend from parent CacheableManager
     * @return array
     */
    public function getValuePaginate(){

        $page = request()->get('page') ? : 1;

        $tagRepository = new TagRepository();

        $tagPaginate = $tagRepository->paginate();

        /**
         * if current page ($page) > lastPage return empty
         */
        if ($tagPaginate->lastPage() < $page) return [];

        $paginateArr = TransformCommon::filterPaginate($tagPaginate->toArray());
        $tags = TagResource::collection($tagPaginate)->jsonSerialize();

        $tags = array_merge(["data" => $tags], $paginateArr);
        
        return $tags;
    }
}