<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Puesto ' . $job->title) }}
        </h2>
    </x-slot:header>
    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center gap-10">
                    <h3 class='text-3xl font-medium'>{{ $job->title }}</h3>
                    <div class='flex flex-col md:flex-row gap-5 justify-between w-full items-center'>
                        <div class="md:flex flex-col gap-1 w-full ">
                            <p>Empresa: <span>{{ $job->company }}</span></p>
                            <p>Disponible hasta: <span>{{ $job->last_day->format('d/m/Y') }}</span></p>
                            <p>Creado: <span>{{ $job->created_at->diffForHumans() }}</span></p>
                        </div>
                        <div class='w-full md:text-right'>
                            <p>Categoría: <span class='font-bold'>{{ $job->category->category }}</span></p>
                            <p>Salario: <span class='font-bold'>{{ $job->salary->salary }}</span></p>

                        </div>


                    </div>
                    <div class='grid md:grid-cols-2 w-full gap-5'>
                        <img src="{{ asset('storage/jobs_image/' . $job->image) }}" alt="{{ $job->title }}"
                            class='w-full aspect-square object-cover' />
                        <div>
                            <p class='font-bold'>Descripcion del puesto:</p>
                            <p class='text-lg'>
                                {{ $job->description }}
                            </p>
                        </div>
                    </div>
                </div>
                @auth
                    @cannot('create', App\Models\Jobs::class)
                        <livewire:apply-job :job="$job" />
                    @endcannot
                @endauth
                @guest
                    <div class='border-[1px] border-dotted border-black dark:border-slate-300 p-5 w-8/12 mx-auto my-5'>
                        <p class='text-center text-black dark:text-slate-200'>
                            <a href="{{ route('register') }}"
                                class='font-bold text-indigo-600 dark;text-indigo-400'>Registrate</a> o <a
                                href="{{ route('login') }}" class='font-bold text-indigo-600 dark;text-indigo-400'>Inicia
                                Sesión</a> para poder postular
                            a
                            este trabajo.
                        </p>
                    </div>
                @endguest
            </div>


        </div>

    </section>

</x-app-layout>
