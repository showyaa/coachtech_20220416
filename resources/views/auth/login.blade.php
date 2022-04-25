<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1>
                <a href="/">SalesManagement</a>
            </h1>
            <p>ログイン</p>
            <style>
                h1 {
                    font-size: 50px;
                }

                p {
                    text-align: center;
                    font-size: 20px;
                }
            </style>
            <title>SalesManagement -ログイン-</title>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="email_space">
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('ログイン状態を保持する') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('パスワードをお忘れの場合') }}
                </a>
                @endif

                <x-button class="ml-3">
                    {{ __('ログイン') }}
                    <style>
                        .ml-3 {
                            background-color: white;
                            color: rgb(22, 166, 166);
                            border: 2px solid rgb(22, 166, 166);
                            font-weight: bolder;
                        }

                        .ml-3:hover {
                            background-color: rgb(22, 166, 166);
                            color: white;
                        }
                    </style>
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>