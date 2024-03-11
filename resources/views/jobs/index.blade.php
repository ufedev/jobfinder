<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trabajos') }}
        </h2>


        @if (session()->has('message'))
            <p
                class='text-sm p-2 my-3 border-2 border-green-900 font-bold text-black dark:text-black bg-gradient-to-tr from-green-200 to-emerald-100'>
                {{ session('message') }}
            </p>
        @endif
    </x-slot>

    <livewire:show-jobs />


</x-app-layout>
