<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="p-6 flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $show->show_name }}</span>
                            {{-- <small
                                class="ml-2 text-sm text-gray-600">{{ $show->created_at ? $show->created_at : 'null' }}
                            </small> --}}
                            @unless ($show->created_at == $show->updated_at)
                                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                            @endunless
                        </div>
                        @if ($show->show_name)
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
                                    <x-dropdown-link :href="route('shows.edit', $show)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('shows.show', $show)">
                                        {{ __('View') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('shows.destroy', $show) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('shows.destroy', $show)"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif

                    </div>
                    <div>
                        <p name="show_description" class="text-gray-800 pt-4">Description: {{ $show->show_description }}
                        </p>
                    </div>
                    <div>
                        <p name="show_date" class="text-gray-800 pt-4">Date: {{ $show->show_date }}</p>
                    </div>
                    <div>
                        <p name="show_entry_date" class="text-gray-800 pt-4">Entry Close Date:
                            {{ $show->show_entry_close }}</p>
                    </div>
                    <div>
                        <img src="{{ $show->show_img }}" alt="{{ $show->show_name }}" class="text-gray-800 pt-4">
                    </div>
                    <div>
                        <p name="show_location" class="text-gray-800 pt-4">Location: {!! $show->show_location !!}</p>
                    </div>
                    <div>
                        @foreach ($assignedJudges as $judge)
                            <div class="bg-white rounded-lg shadow-lg p-6 my-2">
                                <h5 class="text-xl font-semibold mb-2">{{ $judge->judge_name }}</h5>
                                <p class="text-gray-600">Judge ID: {{ $judge->id }}</p>
                                <p class="text-gray-600">Expertise: {{$judge->judge_expertise}}</p>
                                {{-- Council view --}}
                                @foreach ($councils as $council)
                                    @if ($council->id == $judge->council_id)
                                        <p class="text-gray-600">Council: {{$council->council_name}}</p>
                                    @endif
                                    
                                @endforeach
                                <!-- Add more information about the judge as needed -->
                            </div>
                        @endforeach

                    </div>

                    {{-- <div>
                        <p name="show_map" class="text-gray-800 pt-4">Map Url: {{ $show->show_map }}</p>
                    </div> --}}
                    <div class="w-1/2">
                        Map: {!! $show->show_map !!}
                    </div>
                    <div class="w-1/2">
                        Show Rules: {!! $show->show_map !!}
                    </div>
                    <div>
                        <embed src="{{ asset($show->show_rules ?? '') }}" type="application/pdf" width="100%"
                            height="600px">
                    </div>
                    <div>
                        <iframe src="<?php $show->show_rules; ?>" width="100%" height="600px"><?php $show->show_rules; ?></iframe>
                    </div>
                    <div>
                        <iframe src="{{ asset('path/to/pdfjs/web/viewer.html?file=' . $show->show_rules) }}"
                            width="100%" height="600px"></iframe>
                    </div>
                    <div><img src="http://127.0.0.1:8000/uploads/NSAcbudgWzkK3Sxh22o26NcQCkqelhjzKDUHd81u.png"
                            alt="" /></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
