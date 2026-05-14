<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Task;

class JobTaskStore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected mixed $data;

    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $task = new Task();
        
        $task->mode_id = $this->data['mode_id'];    // $modeId;

        $task->langs_ids = $this->data['langs_ids'];    // $langsIds;
        $task->themes_ids = $this->data['themes_ids'];  // $themesIds;

        $task->num_enjoy = $this->data['num_enjoy'];    // $numEnjoy;
        $task->num_normal = $this->data['num_normal'];  // $numNeutral;
        $task->num_worry = $this->data['num_worry'];    // $numWorry;

        $task->status = $this->data['status'];  // $taskStatus;
        $task->user_id = $this->data['user_id'];    // $userId;

        $task->save();
    }
}
