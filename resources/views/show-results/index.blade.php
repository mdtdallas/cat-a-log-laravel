<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form class="border-2 p-4 rounded-xl my-4" method="POST" action="{{ route('results.store') }}">
            @csrf

            <x-label for="cat_id" :value="__('Cat')" class="mt-4 text-xl" />
            <select name="cat_id" id="cat_id" class="block mt-1 w-full">
                <option value="">Select Cat...</option>
                @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                @endforeach
            </select>

            <x-label for="show_id" :value="__('Show')" class="mt-4 text-xl" />
            <select name="show_id" id="show_id" class="block mt-1 w-full">
                <option value="">Select Show...</option>
                @foreach ($shows as $show)
                    <option value="{{ $show->id }}">{{ $show->show_name }}</option>
                @endforeach
            </select>

            <x-label for="placement" :value="__('Placement')" class="mt-4 text-xl" />
            <x-input placement="placement" class="block mt-1 w-full" type="text" name="placement" :value="old('placement')"
                required autofocus />
            <x-input-error for="placement" class="mt-4" />

            <x-label for="score" :value="__('Score')" class="mt-4 text-xl" />
            <x-input score="score" class="block mt-1 w-full" type="text" name="score" :value="old('score')" required
                autofocus />
            <x-input-error for="score" class="mt-4" />



            <x-button class="mt-4">
                {{ __('Add Result') }}
            </x-button>
        </form>


        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($results as $result)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center w-full">
                            <div class="flex justify-between w-5/6">
                                @foreach ($cats as $cat)
                                    @if ($cat->id === $result->cat_id)
                                        <span class="text-gray-600"> {{ $cat->cat_name }}</span>
                                    @endif
                                @endforeach
                                @foreach ($shows as $show)
                                    @if ($show->id === $result->show_id)
                                        <span class="text-gray-600"> {{ $show->show_name }}</span>
                                    @endif
                                @endforeach

                                <span class="text-gray-600"> {{ $result->placement }}</span>
                                <span class="text-gray-600"> {{ $result->score }}</span>

                                <small
                                    class="ml-2 text-sm text-gray-600 flex-end">{{ $result->created_at->format('j M Y') }}</small>
                                @unless ($result->created_at->eq($result->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($result->id)
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
                                        <x-dropdown-link :href="route('results.edit', $result)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('results.destroy', $result) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('results.destroy', $result)"
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
