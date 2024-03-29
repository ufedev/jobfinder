<section class='pt-10 w-full md:w-8/12 lg:w-6/12 mx-auto'>

    <h1 class='text-center font-bold text-5xl text-black dark:text-slate-300'>Trabajos disponibles</h1>
    <livewire:search-job />

    <div class='rounded p-2 shadow mt-5 bg-white dark:bg-slate-950'>

        <ul class='w-full divide-y divide-slate-300 dark:divide-slate-800'>

            @forelse ($jobs as $job)
                <li class='md:flex md:justify-between md:items-center p-3'>
                    <div class='text-black dark:text-slate-300'>
                        <a class=' text-3xl font-bold'
                            href="{{ route('jobs.show', ['job' => $job]) }}">{{ $job->title }}</a>
                        <p>{{ $job->company }}</p>
                        <p>{{ $job->category->category }}</p>
                        <p>{{ $job->salary->salary }}</p>
                        <p class='font-bold'>publicado <span
                                class='font-normal'>{{ $job->created_at->diffForHumans() }}</span></p>
                    </div>
                    <div>
                        <x-primary-a href="{{ route('jobs.show', ['job' => $job]) }}">Ver puesto</x-primary-a>
                    </div>
                </li>
            @empty
                <p class='text-center text-black dark:text-slate-200'>No hay trabajos disponibles!</p>
            @endforelse


        </ul>



        <div class='py-5'>
            {{ $jobs->links() }}
        </div>

    </div>
</section>
