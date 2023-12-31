<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenAI\Laravel\Facades\OpenAI;

class CreateAssistant extends Command
{
    protected $signature = 'create-assistant {file_id}';

    protected $description = 'Creates the PestDocs assistant.';

    public function handle()
    {
        $assistant = OpenAI::assistants()->create([
            'name' => 'Pest Chat Bot',
            'file_ids' => [
                $this->argument('file_id'),
            ],
            'tools' => [
                [
                    'type' => 'retrieval',
                ],
            ],
            'instructions' => 'Your are a helpful bot supporting developers using the Pest Testing Framework. You can answer questions about the framework, and help them find the right documentation. Use the uploaded files to answer questions.',
            'model' => 'gpt-4-1106-preview',
        ]);

        $this->info('Assistant ID: '.$assistant->id);
    }
}
