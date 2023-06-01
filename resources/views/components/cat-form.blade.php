<?php dd($cat); ?>
<x-form-section class="m-6 p-6 mr-40" submit="{{ $cat ? route('cats.update', ['cat' => $cat->cat_id]) : route('cats.store') }}">


    <x-slot name="title">
        {{ $cat ? __('Edit Cat') : __('Create Cat') }}
    </x-slot>

    <x-slot name="description">
        {{ $cat ? __('Update the details of the cat.') : __('Fill in the details to create a new cat.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="cat_name" value="{{ __('Cat Name') }}" />
            <x-input id="cat_name" type="text" class="mt-1 block w-2/3" wire:model.defer="cat.cat_name" :value="old('cat_name', $cat ? $cat->cat_name : '')" autocomplete="cat_name"/>
            <x-input-error for="cat.name" class="mt-2" />
        </div>


        <div class="col-span-6 sm:col-span-4">
            <x-label for="date_of_birth" value="{{ __('Date of Birth') }}" />
            <x-input id="date_of_birth" type="date" class="mt-1 block w-1/3" wire:model.defer="cat.date_of_birth" />
            <x-input-error for="cat.date_of_birth" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="cat_bio" value="{{ __('Cat Bio') }}" />
            <x-textarea id="cat_bio" type="text" class="mt-1 block w-2/3" wire:model.defer="cat.bio" />
            <x-input-error for="cat.bio" class="mt-2" />
        </div>


        <div class="col-span-6 mt-2">
            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Display
                photo</label>
            <div class="mt-2 flex w-1/2 justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="file-upload"
                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="cat_registration" value="{{ __('Cat Registration') }}" />
            <x-input id="cat_registration" type="text" class="mt-1 block w-2/3"
                wire:model.defer="cat.registration" />
            <x-input-error for="cat.registration" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="cat_breeder_name" value="{{ __('Breeder Name') }}" />
            <x-input id="cat_breeder_name" type="text" class="mt-1 block w-2/3"
                wire:model.defer="cat.breeder_name" />
            <x-input-error for="cat.breeder_name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="cat_sire_name" value="{{ __('Sire Name') }}" />
            <x-input id="cat_sire_name" type="text" class="mt-1 block w-2/3" wire:model.defer="cat.sire_name" />
            <x-input-error for="cat.sire_name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="cat_dam_name" value="{{ __('Dam Name') }}" />
            <x-input id="cat_dam_name" type="text" class="mt-1 block w-2/3" wire:model.defer="cat.dam_name" />
            <x-input-error for="cat.dam_name" class="mt-2" />
        </div>

        

        <div class="col-span-6 sm:col-span-4">
            <x-label for="gender_id" value="{{ __('Gender') }}" />
            <select name="gender_id" id="gender_id"
                class="w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Select gender...</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->gender_id }}">{{ $gender->gender_name }}</option>
                @endforeach
            </select>
            <x-input-error for="cat.gender" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="breed_id" value="{{ __('Breed') }}" />
            <select name="breed_id" id="breed_id"
                class="w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Select breed...</option>
                @foreach ($breeds as $breed)
                    <option value="{{ $breed->breed_id }}">{{ $breed->breed_name }}</option>
                @endforeach
            </select>
            <x-input-error for="cat.breed" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="colour_id" value="{{ __('Colour') }}" />
            <select name="colour_id" id="colour_id"
                class="w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Select colour...</option>
                @foreach ($colours as $colour)
                    <option value="{{ $colour->colour_id }}">{{ $colour->colour_name }}</option>
                @endforeach
            </select>
            <x-input-error for="cat.colour" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="type_id" value="{{ __('Cat Category') }}" />
            <select name="type_id" id="type_id"
                class="w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Select Category...</option>
                @foreach ($types as $type)
                    <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                @endforeach
            </select>
            <x-input-error for="cat.type" class="mt-2" />
        </div>





        <!-- Other cat fields -->
    </x-slot>

    <x-slot name="actions">
        {{-- <x-action-message class="mr-3" on="created">
            {{ __('Cat created successfully.') }}
        </x-action-message>

        <x-action-message class="mr-3" on="updated">
            {{ __('Cat updated successfully.') }}
        </x-action-message> --}}

        {{-- <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message> --}}

        <x-button>
            {{ $cat ? __('Update') : __('Create') }}
        </x-button>
    </x-slot>
</x-form-section>

{{--  <x-slot name="title">
        {{ __('Cat Profile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('This information will be displayed publicly so be careful what you share.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="first-name" value="{{ __('Cat Name') }}" />
            <x-input id="first-name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="given-name" />
            <x-input-error for="first-name" class="mt-2" />
        </div>

        <div class="col-span-full">
            <x-label for="about" value="{{ __('About') }}" />
            <textarea id="about" class="mt-1 block w-full" wire:model.defer="state.about" rows="3" ></textarea>
            <x-input-error for="about" class="mt-2" />
            <p class="mt-2 text-sm text-gray-500">
                Write a few sentences about your feline.
            </p>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="date_of_birth" value="{{ __('Date of Birth') }}" />
            <x-input id="date_of_birth" type="date" class="mt-1 block w-full" wire:model.defer="state.date_of_birth"
                autocomplete="date-of-birth" />
            <x-input-error for="date_of_birth" class="mt-2" />
        </div>

        <div class="col-span-full">
            <x-label for="cover-photo" value="{{ __('Display photo') }}" />
            <x-input id="cover-photo" type="file" class="mt-1 block w-full" wire:model.defer="state.cover_photo"
                autocomplete="cover-photo" />
            <x-input-error for="cover-photo" class="mt-2" />
            <p class="mt-2 text-sm text-gray-500">
                Upload a photo of your feline.
            </p>
        </div>

        <div class="col-span-full">
            <x-label for="profile-photo" value="{{ __('Profile photo') }}" />
            <x-input id="profile-photo" type="file" class="mt-1 block w-full" wire:model.defer="state.profile_photo"
                autocomplete="profile-photo" />
            <x-input-error for="profile-photo" class="mt-2" />
            <p class="mt-2 text-sm text-gray-500">
                Upload a photo of your feline.
            </p>
        </div>




<div class="isolate bg-white px-6 py-10 sm:py-32 lg:px-8">
    <form method="POST" action="{{ isset($cat) ? route('cats.update', $cat->id) : route('cats.store') }}"
        class="mx-auto mt-4 max-w-xxl sm:mt-20">
        @csrf
        @if (isset($cat))
            @method('PUT')
        @endif
        <div class="flex">
            <div class="border-b border-gray-900/10 px-10 w-full">

                <h2 class="text-base font-semibold leading-7 text-gray-900">Cat Profile</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful
                    what
                    you share.</p>

                <div class="sm:col-span-3 mt-4">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Cat Name</label>
                    <div class="mt-2">
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                            class="block w-2/3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
                    <div class="mt-2">
                        <textarea id="about" name="about" rows="3"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about your feline.</p>
                </div>

                <div class="sm:col-span-3">
                    <label for="date_of_birth" class="block text-sm font-medium leading-6 text-gray-900">Date of
                        Birth</label>
                    <div class="mt-2">
                        <input type="date" name="date_of_birth" id="date_of_birth" autocomplete="date-of-birth"
                            class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="col-span-full mt-2">
                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Display
                        photo</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-3 mt-2">
                    <label for="cat_registration"
                        class="block text-sm font-medium leading-6 text-gray-900">Registration</label>
                    <div class="mt-2">
                        <input type="text" name="cat_registration" id="cat_registration" autocomplete="registration"
                            class="block w-2/3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <!-- Add more form fields for other cat information -->



            </div>
            <div class="border-b border-gray-900/10 px-10 w-full">

                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                <p class="mb-4 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

                <div class="sm:col-span-3 mt-3">
                    <label for="cat_breeder_name" class="block text-sm font-medium leading-6 text-gray-900">Breeder
                        Name</label>
                    <div class="mt-2">
                        <input type="text" name="cat_breeder_name" id="cat_breeder_name" autocomplete="breeder-name"
                            class="block w-2/3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3 mt-3">
                    <label for="cat_sire_name" class="block text-sm font-medium leading-6 text-gray-900">Cat Sire
                        Name</label>
                    <div class="mt-2">
                        <input type="text" name="cat_sire_name" id="cat_sire_name" autocomplete="cat-sire-name"
                            class="block w-2/3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3 mt-3">
                    <label for="cat_dam_name" class="block text-sm font-medium leading-6 text-gray-900">Cat Dam
                        Name</label>
                    <div class="mt-2">
                        <input type="text" name="cat_dam_name" id="cat_dam_name" autocomplete="cat-dam-name"
                            class="block w-2/3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <label for="gender_id" class="block text-sm font-medium leading-6 text-gray-900 mt-3">Gender</label>
                <select name="gender_id" id="gender_id" class="w-1/3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->gender_id }}">{{ $gender->gender_name }}</option>
                    @endforeach
                </select>

                <label for="breed_id" class="block text-sm font-medium leading-6 text-gray-900 mt-3">Breed</label>
                <select name="breed_id" id="breed_id" class="w-1/3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($breeds as $breed)
                        <option value="{{ $breed->breed_id }}">{{ $breed->breed_name }}</option>
                    @endforeach
                </select>

                <label for="breed_id" class="block text-sm font-medium leading-6 text-gray-900 mt-3">Breed</label>
                <select name="breed_id" id="breed_id" class="w-1/3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($breeds as $breed)
                        <option value="{{ $breed->breed_id }}">{{ $breed->breed_name }}</option>
                    @endforeach
                </select>

                <div class="col-span-full mt-3">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
                    <div class="mt-2">
                        <textarea id="about" name="about" rows="3"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about your feline.</p>
                </div>

                <div class="sm:col-span-3">
                    <label for="date_of_birth" class="block text-sm font-medium leading-6 text-gray-900">Date of
                        Birth</label>
                    <div class="mt-2">
                        <input type="date" name="date_of_birth" id="date_of_birth" autocomplete="date-of-birth"
                            class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="col-span-full mt-2">
                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Display
                        photo</label>
                    <div
                        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>

                <div class="flex w-full">
                    <div class="w-full mt-2">
                        <label for="cat_registration"
                            class="block text-sm font-medium leading-6 text-gray-900">Registration</label>
                        <div class="mt-2">
                            <input type="text" name="cat_registration" id="cat_registration"
                                autocomplete="registration"
                                class="block  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="w-full mt-2">
                        <label for="cat_registration"
                            class="block text-sm font-medium leading-6 text-gray-900">Registration</label>
                        <div class="mt-2">
                            <input type="text" name="cat_registration" id="cat_registration"
                                autocomplete="registration"
                                class="block  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    
                </div>
                <!-- Add more form fields for other cat information -->



            </div>
        </div>
        <x-button class="mt-4">
            {{ isset($cat) ? 'Update' : 'Create' }}
        </x-button>
    </form>
</div>
<form class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
    @csrf
    @if (isset($cat))
        @method('PUT')
    @endif
    <div class="space-y-10">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Cat Profile</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful
                what you share.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                {{-- <div class="sm:col-span-4">
            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span>
                <input type="text" name="username" id="username" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="janesmith">
              </div>
            </div>
          </div> 
          <div class="sm:col-span-3">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Cat Name</label>
            <div class="mt-2">
                <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
            <div class="mt-2">
                <textarea id="about" name="about" rows="3"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
        </div>

        <div class="col-span-full">
            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
            <div class="mt-2 flex items-center gap-x-3">
                <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                        clip-rule="evenodd" />
                </svg>
                <button type="button"
                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
            </div>
        </div>

        <div class="col-span-full">
            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover
                photo</label>
            <div
                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="file-upload"
                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="border-b border-gray-900/10 pb-12">
    <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First
                name</label>
            <div class="mt-2">
                <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="sm:col-span-3">
            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
            <div class="mt-2">
                <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="sm:col-span-4">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                address</label>
            <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="sm:col-span-3">
            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
            <div class="mt-2">
                <select id="country" name="country" autocomplete="country-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>Mexico</option>
                </select>
            </div>
        </div>

        <div class="col-span-full">
            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street
                address</label>
            <div class="mt-2">
                <input type="text" name="street-address" id="street-address"
                    autocomplete="street-address"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1">
            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
            <div class="mt-2">
                <input type="text" name="city" id="city" autocomplete="address-level2"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="sm:col-span-2">
            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State /
                Province</label>
            <div class="mt-2">
                <input type="text" name="region" id="region" autocomplete="address-level1"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="sm:col-span-2">
            <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal
                code</label>
            <div class="mt-2">
                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>
    </div>
</div>

<div class="border-b border-gray-900/10 pb-12">
    <h2 class="text-base font-semibold leading-7 text-gray-900">Notifications</h2>
    <p class="mt-1 text-sm leading-6 text-gray-600">We'll always let you know about important changes, but you
        pick what else you want to hear about.</p>

    <div class="mt-10 space-y-10">
        <fieldset>
            <legend class="text-sm font-semibold leading-6 text-gray-900">By Email</legend>
            <div class="mt-6 space-y-6">
                <div class="relative flex gap-x-3">
                    <div class="flex h-6 items-center">
                        <input id="comments" name="comments" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                    <div class="text-sm leading-6">
                        <label for="comments" class="font-medium text-gray-900">Comments</label>
                        <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                    </div>
                </div>
                <div class="relative flex gap-x-3">
                    <div class="flex h-6 items-center">
                        <input id="candidates" name="candidates" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                    <div class="text-sm leading-6">
                        <label for="candidates" class="font-medium text-gray-900">Candidates</label>
                        <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                    </div>
                </div>
                <div class="relative flex gap-x-3">
                    <div class="flex h-6 items-center">
                        <input id="offers" name="offers" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>
                    <div class="text-sm leading-6">
                        <label for="offers" class="font-medium text-gray-900">Offers</label>
                        <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend class="text-sm font-semibold leading-6 text-gray-900">Push Notifications</legend>
            <p class="mt-1 text-sm leading-6 text-gray-600">These are delivered via SMS to your mobile phone.
            </p>
            <div class="mt-6 space-y-6">
                <div class="flex items-center gap-x-3">
                    <input id="push-everything" name="push-notifications" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-everything"
                        class="block text-sm font-medium leading-6 text-gray-900">Everything</label>
                </div>
                <div class="flex items-center gap-x-3">
                    <input id="push-email" name="push-notifications" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">Same as
                        email</label>
                </div>
                <div class="flex items-center gap-x-3">
                    <input id="push-nothing" name="push-notifications" type="radio"
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="push-nothing" class="block text-sm font-medium leading-6 text-gray-900">No
                        push notifications</label>
                </div>
            </div>
        </fieldset>
    </div>
</div>
</div>

<div class="mt-6 flex items-center justify-end gap-x-6">
<button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
<x-button class="">
    {{ isset($cat) ? 'Update' : 'Create' }}
</x-button>
</div>
</form>
--}}
