<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 drop-shadow-xl mt-4">
        <form method="POST" action="{{ route('results.update', $result) }}">
            @csrf
            @method('patch')

            <x-label for="cat_id" :value="__('Cat')" class="my-4 text-xl"/>
            <select name="cat_id" :value="old('cat_id', $result->cat_id)" class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            @foreach($cats as $cat)
            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
            @endforeach
            </select>

            <x-label for="show_id" :value="__('Show')" class="my-4 text-xl"/>
            <select name="show_id" :value="old('show_id', $result->show_id)" class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            @foreach($shows as $show)
            <option value="{{ $show->id }}">{{ $show->show_name }}</option>
            @endforeach
            </select>
            
            <x-label for="placement" :value="__('Placement')" class="my-4 text-xl"/>
            <x-input
                name="placement"
                class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('placement', $result->placement) }}"
            />
            <x-label for="score" :value="__('Score')" class="my-4 text-xl"/>
            <x-input
                name="score"
                class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('score', $result->score) }}"
            />
           
            <x-button class="mt-4">
                {{ __('Save') }}
                
            </x-button>
            <x-button class="mt-4">
                <a href="{{ route('results.index') }}">Cancel</a>
            </x-button>
        </form>
    </div>
</x-app-layout>
