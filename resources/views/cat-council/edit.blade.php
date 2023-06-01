<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('councils.update', $council) }}">
            @csrf
            @method('patch')
            <x-label for="council_name" :value="__('Cat Council')" class="my-4"/>
            <x-input
                name="council_name"
                class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('council_name', $council->council_name) }}"
            />
            <x-label for="council_short_name" :value="__('Council Short Name')" class="my-4"/>
            <x-input
                name="council_short_name"
                class="block w-full p-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('council_short_name', $council->council_short_name) }}"
            />
            

            <x-label for="council_img" :value="__('Image')" class="mt-3" />
            <x-input id="council_img" class="block mt-1 w-full" type="file" name="council_img" value="{{ old('council_img', $council->council_img) }}"
                 autofocus />
            <x-input-error for="council_img" class="mt-2" />

            <x-label for="council_address" :value="__('Address')" class="mt-3" />
            <x-input id="council_address" class="block mt-1 w-full" type="text" name="council_address"
            value="{{ old('council_address', $council->council_address) }}" required autofocus />
            <x-input-error for="council_address" class="mt-2" />

            <x-label for="council_state" :value="__('State')" class="mt-3" />
            {{-- <select name="council_state" id="council_state" class="block mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/3" :value="old('council_state')">
                @foreach ($states as $state)
                    <option value="{{ $state }}">{{ $state }}</option>
                @endforeach
            </select> --}}
            <x-input id="council_state" class="block mt-1 w-full" type="text" name="council_state"
            value="{{ old('council_state', $council->council_state) }}" required autofocus />
            <x-input-error for="council_address" class="mt-2" />

            <x-label for="council_email" :value="__('Email')" class="mt-3" />
            <x-input id="council_email" class="block mt-1 w-full" type="email" name="council_email"
            value="{{ old('council_email', $council->council_email) }}" required autofocus />
            <x-input-error for="council_email" class="mt-2" />

            <x-label for="council_phone" :value="__('Phone')" class="mt-3" />
            <x-input id="council_phone" class="block mt-1 w-full" type="text" name="council_phone"
            value="{{ old('council_phone', $council->council_phone) }}" required autofocus />
            <x-input-error for="council_phone" class="mt-2" />

            <x-label for="council_url" :value="__('Website')" class="mt-3" />
            <x-input id="council_url" class="block mt-1 w-full" type="text" name="council_url"
            value="{{ old('council_url', $council->council_url) }}" required autofocus />
            <x-input-error for="council_url" class="mt-2" />
           
            <x-button class="mt-4">
                {{ __('Save') }}
                
            </x-button>
            <x-button class="mt-4">
                <a href="{{ route('councils.index') }}">Cancel</a>
            </x-button>
        </form>
    </div>
</x-app-layout>
