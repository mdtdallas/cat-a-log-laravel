<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('colours.update', $colour) }}">
            @csrf
            @method('patch')
            <x-input
                name="colour_name"
                class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('colour_name', $colour->colour_name) }}"
            />
            
           
            <x-button class="mt-4">
                {{ __('Save') }}
                
            </x-button>
            <x-button class="mt-4">
                <a href="{{ route('colours.index') }}">Cancel</a>
            </x-button>
        </form>
    </div>
</x-app-layout>
