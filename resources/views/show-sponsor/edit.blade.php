<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 drop-shadow-xl mt-4">
        <form method="POST" action="{{ route('sponsors.update', $sponsor) }}">
            @csrf
            @method('patch')
            <x-label for="sponsor_name" :value="__('Sponsor Name')" class="my-4 text-xl"/>
            <x-input
                name="sponsor_name"
                class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('sponsor_name', $sponsor->sponsor_name) }}"
            />
            <x-input-error for="sponsor_name" class="mt-2" />

            <x-label for="sponsor_url" :value="__('Website')" class="my-4 text-xl"/>
            <x-input
                name="sponsor_url"
                class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('sponsor_url', $sponsor->sponsor_url) }}"
            />
            <x-input-error for="sponsor_url" class="mt-2" />
          
            
           
            <x-button class="mt-10">
                {{ __('Save') }}
                
            </x-button>
            <x-button class="mt-4">
                <a href="{{ route('sponsors.index') }}">Cancel</a>
            </x-button>
        </form>

        {{-- <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
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
                                <span class="text-gray-600">- ({{ $show->show_date->format('j M Y, g:i a') }})</span>
                                
                            </div>
                        </div>
                    </div>
            </div>
        </div> --}}

    </div>
</x-app-layout>
