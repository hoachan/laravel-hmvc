<?php

namespace Modules\LessonApi\Common;

class TransformCommon {

    /**
     * filter data paginate
     * 
     * @param $arr : data of array that want to convert
     * @return array
     */
    static public function filterPaginate($paginate){
        $newPaginate = [
            "link" => [
                "first" => $paginate["first_page_url"],
                "last"  => $paginate["last_page_url"],
                "prev"  => $paginate["prev_page_url"],
                "next"  => $paginate["next_page_url"],
            ],
            "meta"  => [
                "current_page"  => $paginate["current_page"],
                "from"          => $paginate["from"],
                "last_perpage"  => $paginate["last_page_url"],
                "path"          => $paginate["path"],
                "per_page"      => $paginate["per_page"],
                "to"            => $paginate["to"],
                "total"         => $paginate["total"],
            ]
        ];

        return $newPaginate;
    }
}