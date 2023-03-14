<div>
    <div class="flex flex-col items-center mt-8 space-y-4">

        <div>
            {{ $estimator->question }}
        </div>
        @each('components.estimator-option', $estimator->options, 'option')
        {{-- prev button --}}
        <div class="flex space-x-2">
            @if($estimator->id > 1)
            <button wire:click="prevQuestion"
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                Prev
            </button>
            @endif
            {{-- next button --}}
            <button wire:click="nextQuestion"
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                Next
            </button>
        </div>
    </div>
</div>
