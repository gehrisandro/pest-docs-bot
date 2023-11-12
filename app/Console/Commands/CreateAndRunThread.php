<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenAI\Laravel\Facades\OpenAI;

class CreateAndRunThread extends Command
{
    protected $signature = 'create-and-run-thread {assistant_id} {question}';

    protected $description = 'Creates and runs a thread.';

    public function handle()
    {
        $threadRun = OpenAI::threads()->createAndRun([
            'assistant_id' => $this->argument('assistant_id'),
            'thread' => [
                'messages' =>
                    [
                        [
                            'role' => 'user',
                            'content' => $this->argument('question'),
                        ],
                    ],
            ],
        ]);

        $this->info('Thread run created and started.');
        $this->info('Thread ID: ' . $threadRun->threadId);
        $this->info('Run ID: ' . $threadRun->id);
    }
}
