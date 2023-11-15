<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Responses\Threads\Runs\ThreadRunResponse;

class DocBot extends Component
{
    public string $question = '';

    public ?string $answer = null;

    public string $error;

    public function ask()
    {
        $threadRun = $this->createAndRunThread();

        $this->loadAnswer($threadRun);
    }

    public function render()
    {
        return view('livewire.doc-bot');
    }

    private function createAndRunThread(): ThreadRunResponse
    {
        return OpenAI::threads()->createAndRun([
            'assistant_id' => 'asst_6VzQhp0uC0ZouIRJlxhfxI0a',
            'thread' => [
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $this->question,
                    ],
                ],
            ],
        ]);
    }

    private function loadAnswer(ThreadRunResponse $threadRun)
    {
        while (in_array($threadRun->status, ['queued', 'in_progress'])) {
            $threadRun = OpenAI::threads()->runs()->retrieve(
                threadId: $threadRun->threadId,
                runId: $threadRun->id,
            );
        }

        if ($threadRun->status !== 'completed') {
            $this->error = 'Request failed, please try again';
        }

        $messageList = OpenAI::threads()->messages()->list(
            threadId: $threadRun->threadId,
        );

        $this->answer = $messageList->data[0]->content[0]->text->value;
    }
}
