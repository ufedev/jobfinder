<div class='my-10'>


    @forelse ($jobs as $job)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden border-b-[1px] border-slate-900 dark:border-slate-600 md:flex md:justify-between md:items-center">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class='text-3xl font-medium mb-10'>{{ $job->title }}</h3>
                    <p>{{ $job->company }}</p>

                    <p>Ultimo día para inscribirse: {{ $job->last_day->format('d/m/Y') }}</p>
                </div>

                <div class='flex flex-col md:flex-row justify-stretch gap-1 px-5'>

                    <a href="#"
                        class='bg-emerald-600 font-medium p-2 rounded text-sm text-white text-center'>Candidatos</a>
                    <a href="#" class='bg-sky-600 font-medium p-2 rounded text-sm text-white text-center'>Editar</a>
                    <a href="#"
                        class='bg-red-600 font-medium p-2 rounded text-sm text-white text-center'>Eliminar</a>

                </div>
            </div>
        </div>

    @empty
        <p class='text-center font-sm dark:text-white'> No hay vacantes publicadas por ti</p>
    @endforelse





    <div class='max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10'>
        {{ $jobs->links() }}
    </div>

</div>
