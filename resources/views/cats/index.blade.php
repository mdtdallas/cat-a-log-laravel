<x-app-layout>
    <x-admin>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cats') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="flex justify-between">
                            <div class="mt-8 text-2xl">
                                Cats
                            </div>
                            <div class="mt-8 text-2xl">
                                <a href="{{ route('cats.create') }}" class="bg-green-500 hover:bg-green-700 text-sm text-white py-2 px-4 rounded">Add Cat</a>
                            </div>
                        </div>
                        <div class="mt-6 text-gray-500">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">ID</th>
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Slug</th>
                                        <th class="px-4 py-2">Age</th>
                                        <th class="px-4 py-2">Created On</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cats as $cat)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $cat->cat_id }}</td>
                                            <td class="border px-4 py-2">{{ $cat->cat_name }}</td>
                                            <td class="border px-4 py-2">{{ $cat->slug }}</td>
                                            <td class="border px-4 py-2">
                                                @php
                                                    $dob = \Carbon\Carbon::parse($cat->date_of_birth);
                                                    $now = \Carbon\Carbon::now();
                                                    $age = $dob->diff($now);
                                                @endphp
                                            
                                                {{ $age->y }} years, {{ $age->m }} months, {{ $age->d }} days
                                            </td>
                                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($cat->created_on)->format('d M Y') }}</td>
                                            <td class="border px-4 py-2">
                                                <x-dropdown>
                                                    <x-slot name="trigger">
                                                        <button>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            </svg>
                                                        </button>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <x-dropdown-link :href="route('cats.edit', $cat->cat_id)">
                                                            {{ __('Edit') }}
                                                        </x-dropdown-link>
                                                        <form method="POST" action="{{ route('cats.destroy', $cat->cat_id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <x-dropdown-link :href="route('cats.destroy', $cat->cat_id)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                {{ __('Delete') }}
                                                            </x-dropdown-link>
                                                        </form>
                                                    </x-slot>
                                                </x-dropdown>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-admin>
</x-app-layout>
