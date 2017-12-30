<?

namespace Modules\LessonApi;

class LessonTransfomer  extends Transformer{

    /**
     * Transform data to hoping json
     *  @param  \App\Lesson  $lessons
     */

    public function transform($lessons){
        return [
            'title_of_lesson'   => $lessons['title'],
            'body'              => $lessons['body'],
            'active'         => (Boolean)$lessons['some_bool'],
        ];
    }
}