<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PrepareDocs extends Command
{
    private static array $FILES_TO_IGNORE = [
        'LICENSE.md',
        'README.md',
        'announcing-pest2.md',
        'documentation.md',
        'pest-spicy-summer-release.md',
        'video-resources.md',
        'why-pest.md',
    ];

    protected $signature = 'prepare-docs';

    protected $description = 'Create one file containing the full Pest documentation';

    public function handle()
    {
        $files = Http::get('https://api.github.com/repos/pestphp/docs/contents')->collect();

        $fullDocs = $files->filter(fn (array $file) => $file['download_url'] !== null)
            ->filter(fn (array $file) => ! in_array($file['name'], self::$FILES_TO_IGNORE))
            ->map(fn (array $file) => Http::get($file['download_url'])->body())
            ->implode(PHP_EOL.PHP_EOL);

        Storage::disk('local')->put('full-pest-docs.md', $fullDocs);
    }
}
