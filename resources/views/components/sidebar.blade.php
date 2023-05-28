<div class="bg-gray-200 h-full w-1/6">

    <x-responsive-nav-link href="">
        {{ __('Home Page') }}
    </x-responsive-nav-link>


    <x-responsive-nav-link href="">
        {{ __('Dashboard') }}
    </x-responsive-nav-link>



    <x-responsive-nav-link href="">
        {{ __('Shows') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link href="">
        {{ __('Users') }}
    </x-responsive-nav-link>


    <x-responsive-nav-link href="">
        {{ __('Entries') }}
    </x-responsive-nav-link>


    <x-responsive-nav-link href="{{ route('cats.index') }}">
        {{ __('Cats') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('cats.index')" :active="request()->routeIs('cats.index')">
        {{ __('Cats New') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link href="">
        {{ __('Councils') }}
    </x-responsive-nav-link>


    <x-responsive-nav-link href="">
        {{ __('Messages') }}
    </x-responsive-nav-link>


    <x-responsive-nav-link href="">
        {{ __('Logout') }}
    </x-responsive-nav-link>

</div>
