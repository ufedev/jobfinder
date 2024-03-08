<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trabajos') }}
        </h2>


        @if (session()->has('message'))
            <p
                class='text-sm p-2 my-3 rounded-lg text-white dark:text-white bg-gradient-to-tr from-green-700 to-emerald-600'>
                {{ session('message') }}
            </p>
        @endif
    </x-slot>

    <livewire:show-jobs />

</x-app-layout>
