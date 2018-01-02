<?php

namespace App\Http\Controllers\LessonsApi;

use Modules\LessonApi\Lesson;
use Modules\LessonApi\LessonTransfomer;
use Modules\LessonApi\Resources\LessonResource;

use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Response;

class LessonsController extends ApiController
{

    /**
     * @var \Modules\LessonApi\LessonTransfomer
     */
    protected $lessonTransformer;

    function __construct(LessonTransfomer $lessonTransformer){
        $this->lessonTransformer = $lessonTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $lessons = Lesson::all();
        $limit = request()->get('limit') ?:3;

        $lessons = Lesson::paginate($limit);

        return LessonResource::collection($lessons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /api/v1/lesson
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!request()->input('title')  || !request()->input('body')){
            // return some kind of respond
            //400, 403, 422
            //provide a message
            return $this->setStatusCode(422)
                        ->respondWithError('Parameter failed valiadtion for lesson');
        }

        Lesson::create(request()->all());

        return $this->respondCreated('Lesson successfully created. ');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $lesson = Lesson::find($id);

        if (! $lesson) {
            return $this->respondNotFound('Lesson does not exist. ');
        }
        
        return new LessonResource($lesson);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
