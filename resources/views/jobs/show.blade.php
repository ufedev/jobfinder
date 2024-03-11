<x-app-layout>

    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($job->title) }}
        </h2>
    </x-slot>

    <section class='max-w-[60rem] bg-red-500 mx-auto'>
        {{ $job->title }}
    </section>
</x-app-layout>
