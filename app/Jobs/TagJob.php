<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Modules\LessonApi\Tag;
use Log;

class TagJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $tag;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->tag->update([
            'name' => 'andy killer'
        ]);
        Log::info($this->tag);
    }
}
