<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Trabajo') }}
        </h2>
    </x-slot:header>
    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center gap-10">
                    <h3 class='text-3xl font-medium'>Crear Puesto</h3>


                    <livewire:create-job />

                </div>
            </div>
        </div>

    </section>

</x-app-layout>
