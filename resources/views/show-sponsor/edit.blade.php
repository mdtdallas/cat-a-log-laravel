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

        

    </div>
</x-app-layout>
