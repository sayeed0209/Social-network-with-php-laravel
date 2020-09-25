<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            <img src="https://lh3.googleusercontent.com/proxy/RiCh3GxUI0bJNDqltOEU-zsxhhDc4p788w2E3AkVRSLmM9gLbJp78_792ZKDpLubHfGhWKESUR2qNhAJDcuMz8PaRI339yiHx1B69swwWosi_psSHngERW-nbsKsDwlQFIvQ4LADo0QgwTK-lxVzZQb2jkv-o-1n_gS8WVuix6twd64PbzVH-Jnh_Yzv_qv-oewMyHoddYexJFbTi7T9lDU" alt="" class="w-32">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

                    
            <div class="flex items-center justify-end mt-4">
                
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}
                
                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
            
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
