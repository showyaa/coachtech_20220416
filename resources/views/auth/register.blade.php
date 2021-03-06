<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1><a href="/">SalesManagement</a></h1>
            <p>新規登録</p>
            <style>
                h1 {
                    font-size: 50px;
                }

                p {
                    text-align: center;
                    font-size: 20px;
                }
            </style>
            <title>SalesManagement -登録-</title>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('ユーザー名')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('確認用パスワード')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('登録済みの方はこちら') }}
                </a>

                <x-button class="ml-4">
                    {{ __('登録') }}
                    <style>
                        .ml-4 {
                            background-color: white;
                            color: rgb(22, 166, 166);
                            border: 2px solid rgb(22, 166, 166);
                            font-weight: bolder;
                        }

                        .ml-4:hover {
                            background-color: rgb(22, 166, 166);
                            color: white;
                        }
                    </style>
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>