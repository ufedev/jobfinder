<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Olvidaste tu contraseña? no hay problema. Escribí tu correo y te enviaremos un link para que crees una contraseña nueva') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <x-primary-button>
            {{ __('Restablecer Contraseña') }}
        </x-primary-button>
        <x-link :fhref="route('login')" :shref="route('register')">
            <x-slot:first>
                Inciar Sesión
            </x-slot:first>
            <x-slot:second>
                Crear Cuenta
            </x-slot:second>
        </x-link>
    </form>
</x-guest-layout>
