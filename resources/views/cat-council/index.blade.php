<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('councils.store') }}" class="block border-2 border-white p-3 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @csrf

            <x-label for="council_name" :value="__('Cat Council')" />
            <x-input id="council_name" class="block mt-1 w-full" type="text" name="council_name" :value="old('council_name')"
                required autofocus />
            <x-input-error for="council_name" class="mt-2" />

            <x-label for="council_short_name" :value="__('Short Name')" class="mt-3" />
            <x-input id="council_short_name" class="block mt-1 w-full" type="text" name="council_short_name"
                :value="old('council_short_name')" required autofocus />
            <x-input-error for="council_short_name" class="mt-2" />

            <x-label for="council_img" :value="__('Image')" class="mt-3" />
            <x-input id="council_img" class="block mt-1 w-full" type="file" name="council_img" :value="old('council_img')"
                required autofocus />
            <x-input-error for="council_img" class="mt-2" />

            <x-label for="council_address" :value="__('Address')" class="mt-3" />
            <x-input id="council_address" class="block mt-1 w-full" type="text" name="council_address"
                :value="old('council_address')" required autofocus />
            <x-input-error for="council_address" class="mt-2" />

            <x-label for="council_state" :value="__('State')" class="mt-3" />
            <select name="council_state" id="council_state" class="block mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/3">
                <option value="">Select State...</option>
                @foreach ($states as $state)
                    <option value="{{ $state }}">{{ $state }}</option>
                @endforeach
            </select>
            <x-input-error for="council_address" class="mt-2" />

            <x-label for="council_email" :value="__('Email')" class="mt-3" />
            <x-input id="council_email" class="block mt-1 w-full" type="email" name="council_email"
                :value="old('council_email')" required autofocus />
            <x-input-error for="council_email" class="mt-2" />

            <x-label for="council_phone" :value="__('Phone')" class="mt-3" />
            <x-input id="council_phone" class="block mt-1 w-full" type="text" name="council_phone"
                :value="old('council_phone')" required autofocus />
            <x-input-error for="council_phone" class="mt-2" />

            <x-label for="council_url" :value="__('Website')" class="mt-3" />
            <x-input id="council_url" class="block mt-1 w-full" type="text" name="council_url"
                :value="old('council_url')" required autofocus />
            <x-input-error for="council_url" class="mt-2" />


            <x-button class="mt-4">
                {{ __('Add Cat Council') }}
            </x-button>
        </form>


        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($councils as $council)
                <div class="p-6 flex space-x-2">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg> --}}
                    <img src="{{$council->img}}" alt="img">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $council->council_name }}</span>
                                <small
                                    class="ml-2 text-sm text-gray-600">{{ $council->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($council->created_at->eq($council->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($council->council_name)
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
                                        <x-dropdown-link :href="route('councils.edit', $council)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('councils.destroy', $council) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('councils.destroy', $council)"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>
                        <div>
                            <span class="text-gray-600">{{ $council->council_short_name }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">{{ $council->council_address }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">{{ $council->council_state }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">{{ $council->council_email }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">{{ $council->council_phone }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">{{ $council->council_url }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
