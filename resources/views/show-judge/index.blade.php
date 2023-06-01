<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form class="border-2 p-4 rounded-xl my-4" method="POST" action="{{ route('judges.store') }}">
            @csrf

            <x-label for="judge_name" :value="__('Judge Name')" class="mt-4 text-xl" />
            <x-input id="judge_name" class="block mt-1 w-full" type="text" name="judge_name" :value="old('judge_name')" required
                autofocus />
            <x-input-error for="judge_expertise" class="mt-4" />

            <x-label for="judge_expertise" :value="__('Expertise')" class="mt-4 text-xl" />
            <x-input id="judge_expertise" class="block mt-1 w-full" type="text" name="judge_expertise"
                :value="old('judge_expertise')" required autofocus />
            <x-input-error for="judge_expertise" class="mt-4" />

            <x-label for="council_id" :value="__('Cat Council')" class="mt-4 text-xl" />
            <select name="council_id"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Select Council...</option>
                @foreach ($councils as $council)
                    <option value="{{ $council->id }}">{{ $council->council_name }}</option>
                @endforeach
            </select>

            <x-button class="mt-4">
                {{ __('Add Show Judge') }}
            </x-button>
        </form>


        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($judges as $judge)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center w-full">
                            <div class="flex justify-between w-5/6">
                                <span class="text-gray-800">{{ $judge->judge_name }}</span>
                                <span class="text-gray-600"> {{ $judge->judge_expertise }}</span>
                                @foreach ($councils as $council)
                                    @if ($council->id === $judge->council_id)
                                        <span class="text-gray-600"> {{ $council->council_name }}</span>
                                    @endif
                                @endforeach
                                <small
                                    class="ml-2 text-sm text-gray-600 flex-end">{{ $judge->created_at->format('j M Y') }}</small>
                                @unless ($judge->created_at->eq($judge->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($judge->judge_name)
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('judges.edit', $judge)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('judges.destroy', $judge) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('judges.destroy', $judge)"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
