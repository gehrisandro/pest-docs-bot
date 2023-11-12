<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenAI\Laravel\Facades\OpenAI;

class GetRunResult extends Command
{
    protected $signature = 'get-run-result {thread_id} {run_id}';

    protected $description = 'Get the result of the run';

    public function handle()
    {
        $threadRun = OpenAI::threads()->runs()->retrieve(
            threadId: $this->argument('thread_id'),
            runId: $this->argument('run_id'),
        );

        if($threadRun->status !== 'completed'){
            $this->error('Thread run not completed yet. Try again later!');
            return 1;
        }

        $messageList = OpenAI::threads()->messages()->list(
            threadId: $this->argument('thread_id'),
        );

        $this->info($messageList->data[0]->content[0]->text->value);
    }
}
