<?
namespace Modules\LessonApi;

abstract class Transformer {
    
    /**
     * Transform a collection of lesson
     * 
     * @Param $lessons
     * 
     * @return array
     */

    public function transformCollection(array $items){

        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($items);
}