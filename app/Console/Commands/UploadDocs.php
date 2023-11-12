<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;

class UploadDocs extends Command
{
    protected $signature = 'upload-docs';

    protected $description = 'Uploads all the docs to OpenAI';

    public function handle()
    {
        $fullDocs = '';

        foreach(Storage::disk('docs')->files() as $file) {
            $fullDocs .= Storage::disk('docs')->get($file) . PHP_EOL . PHP_EOL;
        }

        Storage::disk('local')->put('full-pest-docs.md', $fullDocs);

        $result = OpenAI::files()->upload([
            'purpose' => 'assistants',
            'file' => fopen(storage_path('app/full-pest-docs.md'), 'r'),
        ]);

        $this->info('Done!');

        $this->info('File ID: ' . $result->id);
    }
}
