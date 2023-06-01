<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('ranks.update', $rank) }}">
            @csrf
            @method('patch')
            <x-input
                name="rank_name"
                class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('rank_name', $rank->rank_name) }}"
            />
            
           
            <x-button class="mt-4">
                {{ __('Save') }}
                
            </x-button>
            <x-button class="mt-4">
                <a href="{{ route('ranks.index') }}">Cancel</a>
            </x-button>
        </form>
    </div>
</x-app-layout>
