<x-guest-layout>
    <div x-data="{ tab: 'user' }">
        <!-- Tabs -->
        <div class="flex justify-center mb-8 space-x-4">
            <button type="button" @click="tab = 'user'" :class="tab === 'user' ? 'bg-indigo-600 text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="w-1/2 py-2 rounded-lg font-semibold transition-all duration-200">
                User
            </button>
            <button type="button" @click="tab = 'admin'" :class="tab === 'admin' ? 'bg-gray-800 text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="w-1/2 py-2 rounded-lg font-semibold transition-all duration-200">
                Admin
            </button>
        </div>

        <div class="text-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-800" x-text="tab === 'admin' ? 'Admin Login' : 'User Login'"></h2>
            <p class="text-sm text-gray-500 mt-1" x-text="tab === 'admin' ? 'Please sign in to manage the system' : 'Please sign in to access your account'"></p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf
            
            <input type="hidden" name="login_type" x-bind:value="tab">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            <!-- Register Link (Only for User Tab) -->
            <div x-show="tab === 'user'" x-cloak>
                <a class="underline text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    Don't have an account? Register
                </a>
            </div>
            
            <div x-show="tab === 'admin'" x-cloak></div>

            <div class="flex items-center">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3 bg-indigo-600 hover:bg-indigo-700">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
    </div>
</x-guest-layout>
