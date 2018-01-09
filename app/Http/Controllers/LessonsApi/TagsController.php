<?php

namespace App\Http\Controllers\LessonsApi;

use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Response;

use App\Events\TagEvent;

use App\Jobs\TagJob;

use Modules\LessonApi\Tag;
use Modules\LessonApi\Lesson;
use Modules\LessonApi\Services\TagService;

class TagsController extends ApiController
{

    protected $tagService;

    function __construct(
        TagService $tagService
    ){
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id : null
     * @return \Illuminate\Http\Response
     */
    public function index($lessonId = null)
    {
        $tags = $this->tagService->all();

        event(new TagEvent($tags));

        $tag = Tag::find(1);

        TagJob::dispatch($tag);

        if (empty($tags)) {
            return $this->respondWithError("このページは存在しません。");
        }

        return $tags;
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
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }

    /**
     * @param $lessonId : null
     *get tags with conditional check
     */
    public function getTags($lessonId){

        return $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();
    }
}
