<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('shows.store') }}" enctype="multipart/form-data">
            @csrf

            <x-label for="show_name" :value="__('Show Title')" />
            <x-input id="show_name" class="block mt-1 w-full" type="text" name="show_name" :value="old('show_name')" required
                autofocus />
            <x-input-error for="show_name" class="mt-2" />

            <x-label for="show_description" :value="__('Description')" class="mt-3"/>
            <x-textarea id="show_description" class="block mt-1 w-full" type="text" name="show_description"
                :value="old('show_description')" required autofocus />
            <x-input-error for="show_description" class="mt-2" />

            <x-label for="show_date" :value="__('Date')" class="mt-3"/>
            <x-input id="show_date" class="block mt-1 w-1/2" type="date" name="show_date" :value="old('show_date')" required
                autofocus />
            <x-input-error for="show_date" class="mt-2" />

            <x-label for="show_entry_close" :value="__('Entry Closing Date')" class="mt-3"/>
            <x-input id="show_entry_close" class="block mt-1 w-1/2" type="date" name="show_entry_close"
                :value="old('show_entry_close')" required autofocus />
            <x-input-error for="show_entry_close" class="mt-2" />

            <x-label for="show_img" :value="__('Image')" class="mt-3"/>
            <x-input id="show_img" class="block mt-1 w-1/2" type="file" name="show_img"
                :value="old('show_img')"  autofocus />
            <x-input-error for="show_img" class="mt-2" />

            <x-label for="show_location" :value="__('Location')" class="mt-3"/>
            <x-input id="show_location" class="block mt-1 w-full" type="text" name="show_location"
                :value="old('show_location')" required autofocus />
            <x-input-error for="show_location" class="mt-2" />

            <x-label for="show_map" :value="__('Map URL')" class="mt-3"/>
            <x-input id="show_map" class="block mt-1 w-full" type="text" name="show_map"
                :value="old('show_map')" required autofocus />
            <x-input-error for="show_map" class="mt-2" />

            <x-label for="show_rules" :value="__('Rules')" class="mt-3"/>
            <x-input id="show_rules" class="block mt-1 w-full" type="file" name="show_rules"
                :value="old('show_rules')"  autofocus />
            <x-input-error for="show_rules" class="mt-2" />

            <x-label for="show_covid_plan" :value="__('Covid Plan')" class="mt-3"/>
            <x-input id="show_covid_plan" class="block mt-1 w-full" type="file" name="show_covid_plan"
                :value="old('show_covid_plan')"  autofocus />
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
                {{ __('Add Cat Show') }}
            </x-button>
        </form>


        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($shows as $show)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $show->show_name }}</span>
                                <small
                                    class="ml-2 text-sm text-gray-600">{{ $show->created_at ? $show->created_at : 'null' }}
                                </small>
                                @unless ($show->created_at==$show->updated_at)
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($show->show_name)
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('shows.edit', $show)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('shows.show', $show)">
                                            {{ __('View') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('shows.destroy', $show) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('shows.destroy', $show)"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
