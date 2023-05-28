<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" autofocus />
            </div>
            <div class="flex justify-between mt-4">
                <button id="togglePasswordButton" type="button" onclick="togglePasswordVisibility('password')">Show
                    Password</button>
            </div>
            <div class="flex justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
<script>
    // SHOW PASSWORD BUTTON START
    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        var togglePasswordButton = document.getElementById('togglePasswordButton');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            togglePasswordButton.textContent = "Hide Password";
        } else {
            passwordInput.type = "password";
            togglePasswordButton.textContent = "Show Password";
        }
    }
    // SHOW PASSWORD BUTTON END
</script>
