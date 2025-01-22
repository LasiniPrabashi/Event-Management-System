<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
        @csrf
        <input type="hidden" name="invitation_id" value="{{ request('invitation_id') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="('Password')" />
            <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="flex items-center text-gray-600">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between mt-6">
            <x-primary-button class="w-full justify-center py-3 px-4">
                {{ __('Log in') }}
            </x-primary-button>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="w-full text-center py-2 px-4 text-white bg-gray-800 border border-gray-300 rounded-md hover:bg-gray-200 transition duration-200 ease-in-out">
                    {{ __('Register') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
