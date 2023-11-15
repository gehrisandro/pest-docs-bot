<div class="bg-white shadow sm:rounded-lg max-w-2xl">
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">PEST Documentation Assistant</h3>
        <div class="mt-2 max-w-xl text-sm text-gray-500">
            <p>Enter you question, and I will try to find an answer in the current Pest documentation.</p>
        </div>
        <form class="mt-5 sm:flex sm:items-center" wire:submit.prevent="ask">
            <div class="w-full sm:max-w-xs">
                <label for="question" class="sr-only">Question</label>
                <input type="text"
                       name="question"
                       wire:model="question"
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                       placeholder="How to run a single test?"
                >
            </div>
            <button type="submit"
                    class="mt-3 inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:ml-3 sm:mt-0 sm:w-auto"
            >
                <span wire:loading.class="invisible">Ask</span>
                <x-spinner class="absolute invisible" wire:loading.class.remove="invisible" />
            </button>
        </form>
        @if($answer)
            <h3 class="mt-8 mb-1 text-base font-semibold leading-6 text-gray-900">My answer</h3>
            <div class="mb-2 prose">
                <x-markdown>{!! $answer !!}</x-markdown>
            </div>
        @endif
    </div>
</div>
