@extends('theme.base')
<body class="bg-gray-100 bg-no-repeat bg-center sm:bg-cover" style="background-image: url('../images/entrada2.jpg')">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg my-20 mx-20">

            <div class="flex justify-center mb-8">
                <img src="../images/logoCompleto.jpeg" class="w-48 h-48 " alt="">
            </div>
    
            <div class="mb-4 text-sm text-black">
                {{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.') }}
            </div>
        
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
        
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Email reseteo de contraseña') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>