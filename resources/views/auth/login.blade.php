<x-guest-layout>
    <x-auth-card>
        {{-- <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot> --}}

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        

        <form method="POST" action="{{ route('login') }}">

             <!-- title -->
             <div>
                <div class="text-center fa-2x" >Library</div>
            </div>

             <!-- title icons -->
            <div>
                <div class="text-center">
                    <i class="bi bi-book-half fa-4x" style="color:rgba(0, 0, 255, 0.66);"></i>
                </div>
            </div>

            @csrf

            <!-- Username  -->
            <div class="mt-4">
                <x-label for="username" :value="__('Username')" />
                <x-input id="username" class=" block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>
            

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password"/>
            </div>

            
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-blue-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
          
               <!-- Button log in -->
            <div>
                <div class="text-center">
                    <x-button>
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </div>
            

             <!-- Route Forgout Password -->
             
            <div class=" flex items-center justify-end mt-1">
                
                @if (Route::has('password.request'))

                    <div class="mt-2 mr-3 " >
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password? ') }}
                        </a>
                    </div>
                @endif
                @if (Route::has('register'))
                    <div class="mt-2 mr-1">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __(' Register?') }}
                        </a>
                    </div>
                @endif
                
                 {{-- <!-- Button log in -->
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button> --}}

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
