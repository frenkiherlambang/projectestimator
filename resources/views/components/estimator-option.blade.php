<div>
    @switch($option->estimator->answer_type)
    @case('text')
    {{-- input text --}}
    <input type="text" name="option" id="option-{{$option->id }}"
        class="block w-full px-4 py-2 mt-2 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none"
        placeholder="Enter your answer" />
    @break
    @case('boolean')
    <input type="radio" name="option" value="DeliveryStandard" id="option-{{$option->id }}"
        class="peer hidden [&:checked_+_label_svg]:block" />

    <label for="option-{{$option->id }}"
        class="flex items-center justify-between p-4 text-sm font-medium border border-gray-100 rounded-lg shadow-sm cursor-pointer hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500">
        <div class="flex items-center gap-2">
            <svg class="hidden w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>

            <p class="text-gray-700">{{$option->option }}</p>
        </div>
    </label>
    @break
    @case('multiple')
    {{-- checkbox with label --}}
    <input type="checkbox" name="option" value="DeliveryStandard" id="option-{{$option->id }}"
        class="peer hidden [&:checked_+_label_svg]:block" />
    <label for="option-{{$option->id }}"
        class="flex items-center justify-between p-4 text-sm font-medium border border-gray-100 rounded-lg shadow-sm cursor-pointer hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500">
        <div class="flex items-center gap-2">
            <svg class="hidden w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>

            <p class="text-gray-700">{{$option->option }}</p>
        </div>
    </label>
    @break
    @default

    @endswitch


</div>
