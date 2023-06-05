<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('shows.update', $show) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <x-label for="show_name" :value="__('Show Title')" />
            <x-input id="show_name" class="block mt-1 w-full" type="text" name="show_name" :value="old('show_name', $show->show_name)" required
                autofocus />
            <x-input-error for="show_name" class="mt-2" />

            <x-label for="show_description" :value="__('Description')" class="mt-3" />
            <textarea id="show_description" class="block mt-1 w-1/2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="show_description" :value="old('show_description', $show->show_description)"
                required autofocus >{{  $show->show_description  }}</textarea>
            <x-input-error for="show_description" class="mt-2" />

            <x-label for="show_date" :value="__('Date')" class="mt-3" />
            <x-input id="show_date" class="block mt-1 w-1/2" type="text" name="show_date" :value="old('show_date', $show->show_date)" required
                autofocus />
            <x-input-error for="show_date" class="mt-2" />

            <x-label for="show_entry_close" :value="__('Entry Closing Date')" class="mt-3" />
            <x-input id="show_entry_close" class="block mt-1 w-1/2" type="text" name="show_entry_close"
                :value="old('show_entry_close', $show->show_entry_close)" required autofocus />
            <x-input-error for="show_entry_close" class="mt-2" />

            <x-label for="show_img" :value="__('Image')" class="mt-3" />
            <x-input id="show_img" class="block mt-1 w-1/2" type="file" name="show_img" :value="old('show_img')" 
                autofocus />
            <span>{{ $show->show_img }}</span>
            <x-input-error for="show_img" class="mt-2" />

            <x-label for="show_location" :value="__('Location')" class="mt-3" />
            <x-input id="show_location" class="block mt-1 w-1/2" type="text" name="show_location" :value="old('show_location', $show->show_location)"
                required autofocus />
            <x-input-error for="show_location" class="mt-2" />

            <x-label for="show_map" :value="__('Map')" class="mt-3" />
            <x-input id="show_map" class="block mt-1 w-1/2" type="text" name="show_map" :value="old('show_map', $show->show_map)" required
                autofocus />
            <x-input-error for="show_map" class="mt-2" />

            <x-label for="show_rules" :value="__('Rules')" class="mt-3" />
            <x-input id="show_rules" class="block mt-1 w-1/2" type="file" name="show_rules" :value="old('show_rules')"
                 autofocus />
            <span>{{ $show->show_rules }}</span>
            <x-input-error for="show_rules" class="mt-2" />

            <x-label for="show_covid_plan" :value="__('Covid Plan')" class="mt-3" />
            <x-input id="show_covid_plan" class="block mt-1 w-1/2" type="file" name="show_covid_plan"
                :value="old('show_covid_plan')"  autofocus />
            <span>{{ $show->show_covid_plan }}</span><br>
            <x-input-error for="show_covid_plan" class="mt-2" />

            <h2>Assign Judges:</h2>
            @foreach ($judges as $judge)
                <div>
                    <input type="checkbox" id="judge_{{ $judge->id }}" name="judges[]" value="{{ $judge->id }}"
                        {{ $judge->assignedJudges->contains('id', $judge->id) ? 'checked' : '' }}>
                    <label for="judge_{{ $judge->id }}">{{ $judge->judge_name }}</label>
                </div>
            @endforeach

           
            <x-button class="mt-4">
                {{ __('Save') }}

            </x-button>
            <x-button class="mt-4">
                <a href="{{ route('shows.index') }}">Cancel</a>
            </x-button>
        </form>
    </div>
</x-app-layout>
