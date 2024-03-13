<x-app-layout>

    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($job->title) }}
        </h2>
    </x-slot>

    <section class='max-w-[60rem] bg-slate-300 dark:bg-gray-400 mx-auto mt-10 p-3 rounded'>

        <div class=" md:flex md:justify-between">
            <div class='space-y-4'>
                <h3 class='text-3xl font-medium'>{{ $job->title }}</h3>
                <p class='text-sm font-medium text-slate-700 dark:text-slate-800'>Empresa:
                    <span class='font-bold'>{{ $job->company }}</span>
                </p>
                <p class='text-sm font-medium text-slate-700 dark:text-slate-800'>Ultimo día para postularse:
                    <span class='font-bold'>{{ $job->last_day->format('d-m-Y') }}</span>
                </p>
            </div>

            <div class="mt-4 md:mt-0 space-y-4 flex flex-col items-start justify-end">
                @auth
                    <button
                        class='font-medium text-start p-1 px-5 text-white dark:text-black w-full  bg-slate-900 dark:bg-slate-50 rounded-md'>Postularme</button>
                @endauth
                <p class='text-sm font-medium text-slate-700 dark:text-slate-800'>Categoria:
                    <span class='font-bold'>{{ $job->category->category }}</span>
                </p>
                <p class='text-sm font-medium text-slate-700 dark:text-slate-800'>Salario:
                    <span class='font-bold'>{{ $job->salary->salary }}</span>
                </p>
            </div>
        </div>
        <div class='mt-5 p-5 bg-slate-200 dark:bg-gray-800 text-black dark:text-white rounded'>
            <h6 class='font-bold'>Descripción del puesto:</h6>
            <div class='mt-5 flex flex-col items-center md:flex-row md:items-start gap-5'>
                <div class='w-80'>
                    <img src="{{ asset('storage/jobs_image/' . $job->image) }}" alt="Imagen de {{ $job->title }}">
                </div>
                <p class='text-nowrap'>{{ $job->description }}</p>
            </div>
        </div>

        @guest
            <div class="bg-slate-50 p-2 mt-2 border-2 border-dotted border-slate-900">
                <p class="text-center font-bold">Desear aplicar a esta vacantel. <a class='text-blue-800'
                        href={{ route('login') }}>Crea una cuenta
                        y aplica a esta y otras
                        vacantes</a></p>
            </div>
        @endguest
    </section>
</x-app-layout>
