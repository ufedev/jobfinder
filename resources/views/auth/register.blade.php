<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- Rol -->

        <div class="mt-4">
            <x-input-label for="rol" :value="__('Seleccione un Rol')" />

            <select name="rol"
                class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full'>
                <option value="" selected disabled>-- Seleccione un Rol --</option>
                <option value="1">Developer -- Busca Empleo</option>
                <option value="2">Recluiter -- Ofrece Empleo</option>
            </select>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>



        <x-primary-button class="">
            Crear Cuenta
        </x-primary-button>



    </form>
    <x-link :fhref="route('login')" :shref="route('password.request')">
        @slot('first')
            Iniciar Sesión
        @endslot
        @slot('second')
            Olvide la contraseña
        @endslot
    </x-link>
</x-guest-layout>
