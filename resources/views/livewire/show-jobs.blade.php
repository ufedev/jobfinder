<div class='my-10'>


    @forelse ($jobs as $job)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden border-b-[1px] border-slate-900 dark:border-slate-600 md:flex md:justify-between md:items-center">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('jobs.show', ['job' => $job]) }}">
                        <h3 class='text-3xl font-medium mb-10'>{{ $job->title }}</h3>
                    </a>
                    <p>{{ $job->company }}</p>

                    <p>Ultimo día para inscribirse: {{ $job->last_day->format('d/m/Y') }}</p>
                </div>

                <div class='flex flex-col md:flex-row justify-stretch gap-1 px-5'>

                    <a href="#"
                        class='bg-emerald-600 font-medium p-2 rounded text-sm text-white text-center'>Candidatos</a>
                    <a href="{{ route('jobs.edit', ['job' => $job]) }}"
                        class='bg-sky-600 font-medium p-2 rounded text-sm text-white text-center'>Editar</a>
                    <button wire:click="$dispatch('delete_alert', {'jobId': {{ $job->id }}} )"
                        class='bg-red-600 font-medium p-2 rounded text-sm text-white text-center'>Eliminar</button>

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
@script
    <script>
        $wire.on('delete_alert', ({
            jobId
        }) => {
            // console.log('hola')

            Swal.fire({
                title: "Seguro desea eliminar?",
                text: "Una vez hecho el proceso es irreversible",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.dispatch('delete_server', {
                        jobId
                    })
                    Swal.fire({
                        title: "Eliminado",
                        text: "Esta vacante ha sido eliminada con éxito",
                        icon: "success"
                    });
                }
            });
        })
    </script>
@endscript
