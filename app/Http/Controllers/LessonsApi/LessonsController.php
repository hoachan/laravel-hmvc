<?php

namespace App\Http\Controllers\LessonsApi;

use Modules\Api\Lesson;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();

        return Response::json([
            'data' => $this->transformCollection($lessons)
        ], 200);
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            return Response::json([
                'error' => [
                    'message'   => 'Lesson does not exist',
                ]
            ], 404);
        }
        return Response::json([
            'data' => $lesson->toArray()
        ]);
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

    /**
     * Transform data to hoping json
     *  @param  \App\Lesson  $lessons
     */
    public function transformCollection($lessons){

        return array_map([$this, 'trasform'], $lessons->toArray());
    }

    public function trasform($lessons){
        return [
            'title_of_lesson'   => $lessons['title'],
            'body'              => $lessons['body'],
            'active'         => (Boolean)$lessons['some_bool'],
        ];
    }
}
