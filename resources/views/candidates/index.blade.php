<x-app-layout>

    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos de ' . $job->title) }}
        </h2>
    </x-slot:header>
    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center gap-10">
                    <h3 class='text-3xl font-medium'>Candidatos</h3>
                    <ul class='w-full divide-y divide-slate-400 dark:divide-slate-600'>
                        @forelse($candidates as $candidate)
                            <li class="flex flex-col gap-5 md:gap-0 md:flex-row md:justify-between md:items-center p-5">
                                <div>
                                    {{-- <pre></pre> --}}
                                    <p>Nombre: {{ $candidate->user->name }}</p>
                                    <p>Email: {{ $candidate->user->email }}</p>
                                    <p class='text-sm text-slate-700 dark:text-slate-400'>Fecha de solicitud:
                                        {{ $candidate->created_at->format('d-M-Y') }}</p>
                                </div>
                                <div>
                                    <div>
                                        <a class='p-2 rounded-full bg-black dark:bg-white text-white dark:text-black text-xs font-medium'
                                            href="{{ asset('storage/cv/' . $candidate->cv) }}" target="_blank"
                                            rel='noopener norefer'>Ver CV</a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <p>No hay candidatos</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </section>

</x-app-layout>
