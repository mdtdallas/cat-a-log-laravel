<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('types.update', $type) }}">
            @csrf
            @method('patch')
            <x-label for="type_name" :value="__('Cat Type')" class="my-4"/>
            <x-input
                name="type_name"
                class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('type_name', $type->type_name) }}"
            />
            
           
            <x-button class="mt-4">
                {{ __('Save') }}
                
            </x-button>
            <x-button class="mt-4">
                <a href="{{ route('types.index') }}">Cancel</a>
            </x-button>
        </form>
    </div>
</x-app-layout>
