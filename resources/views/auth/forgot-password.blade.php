<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1>
                <a href="/">SalesManagement</a>
            </h1>
            <p>パスワードをお忘れですか？</p>
            <style>
                h1 {
                    font-size: 50px;
                }

                p {
                    text-align: center;
                    font-size: 20px;
                }
            </style>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('登録時にご登録されたメールアドレスをご入力の上、「送信」をクリックしてください。「パスワード再設定ページURL」を記載したメールをお送りいたします。') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="pass_reset_btn">
                    {{ __('送信') }}
                    <style>
                        .pass_reset_btn {
                            background-color: white;
                            color: rgb(22, 166, 166);
                            border: 2px solid rgb(22, 166, 166);
                            font-weight: bolder;
                        }

                        .pass_reset_btn:hover {
                            background-color: rgb(22, 166, 166);
                            color: white;
                        }
                    </style>
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>