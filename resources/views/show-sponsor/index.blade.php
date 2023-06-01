<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form class="border-2 p-4 rounded-xl my-4" method="POST" action="{{ route('sponsors.store') }}">
            @csrf

            <x-label for="sponsor_name" :value="__('Sponsor Name')" class="mt-4 text-xl"/>
            <x-input id="sponsor_name" class="block mt-1 w-full" type="text" name="sponsor_name" :value="old('sponsor_name')" required
                autofocus />
            <x-input-error for="sponsor_expertise" class="mt-4" />

            <x-label for="sponsor_img" :value="__('Image')" class="mt-4 text-xl" />
            <x-input id="sponsor_img" class="block mt-1 w-full" type="file" name="sponsor_img" :value="old('sponsor_img')" required
                autofocus />
            <x-input-error for="sponsor_expertise" class="mt-4" />

            <x-label for="sponsor_url" :value="__('Website')" class="mt-4 text-xl" />
            <x-input id="sponsor_url" class="block mt-1 w-full" type="text" name="sponsor_url" :value="old('sponsor_url')" required
                autofocus />
            <x-input-error for="sponsor_url" class="mt-4" />

            <x-button class="mt-4">
                {{ __('Add Show Sponsor') }}
            </x-button>
        </form>


        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($sponsors as $sponsor)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $sponsor->sponsor_name }}</span>
                                <span class="text-gray-600">- {{ $sponsor->sponsor_url }}</span>
                                <small
                                    class="ml-2 text-sm text-gray-600">{{ $sponsor->created_at->format('j M Y, g:i a') }}</small>
                                    @unless ($sponsor->created_at->eq($sponsor->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($sponsor->sponsor_name)
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('sponsors.edit', $sponsor)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('sponsors.destroy', $sponsor) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('sponsors.destroy', $sponsor)" onclick="event.preventDefault(); this.closest('form').submit();">
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
