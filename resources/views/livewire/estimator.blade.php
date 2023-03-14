<div>
    {{--
    <pre> --}}
        {{-- {!! var_dump($estimatorSequence) !!} --}}

        {{-- </pre> --}}

    <div class="flex flex-col items-start">
        {{-- @foreach ($answers as $key => $value)
        {{ $key }} =>
        @if(is_array($value))
        @foreach ($value as $k => $v)
        {{ $k }} => {{ $v }}<br>
        @endforeach
        @else
        {{ $value }}<br>
        @endif
        @endforeach --}}
        {{-- {{ var_dump}} --}}
    </div>
    <div class="flex flex-col items-center mt-8 space-y-4">
        @if($showResult)
        <div class="flex flex-col items-start space-y-4 text-left">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm divide-y-2 divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                Fitur
                            </th>
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                Keterangan
                            </th>
                            <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">
                                Harga
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @foreach($questionsAnswers as $value)
                        <tr>
                            <td class="px-4 py-2 font-medium text-gray-900">
                                {{ $value['question'] }}
                            </td>
                            <td class="px-4 py-2 text-gray-700">
                                @if(is_array($value['answer']))
                                @foreach($value['answer'] as $answer)
                                {{ $answer }},
                                @endforeach
                                @else
                                {{ $value['answer'] }}<br>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-gray-700">Rp{{ number_format($value['harga'],0) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <strong>Total: Rp.{{ number_format($estimatePrice, 0) }}</strong>
        </div>
        @else
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
        @endif

    </div>
</div>
