<x-app-layout>
    <x-admin>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-8 text-2xl">
                            Categories
                        </div>
                        <div class="mt-6 text-gray-500">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">ID</th>
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Slug</th>
                                        <th class="px-4 py-2">Created At</th>
                                        <th class="px-4 py-2">Updated At</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cats as $cat)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $cat->id }}</td>
                                            <td class="border px-4 py-2">{{ $cat->name }}</td>
                                            <td class="border px-4 py-2">{{ $cat->slug }}</td>
                                            <td class="border px-4 py-2">{{ $cat->created_at }}</td>
                                            <td class="border px-4 py-2">{{ $cat->updated_at }}</td>
                                            <td class="border px-4 py-2">
                                                <a href="{{ route('cats.edit', $cat->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                                <form action="{{ route('cats.destroy', $cat->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-8 text-2xl">
                                <a href="{{ route('cats.show') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-admin>
</x-app-layout>
