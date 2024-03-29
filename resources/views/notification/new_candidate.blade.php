<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot:header>
    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center gap-10">
                    <h3 class='text-3xl font-medium'>Notificaciones</h3>
                    <ul class='divide-y divide-slate-300 dark:divide-slate-500 w-full'>
                        @forelse($notifications as $notification)
                            <li class="flex flex-col gap-5 md:gap-0 md:flex-row md:justify-between md:items-center p-5">
                                <div>
                                    <p>Tienes una nueva notificación de <span
                                            class='font-bold'>{{ $notification->data['job_title'] }}</span></p>
                                    <p>{{ $notification->created_at->diffForHumans() }}</p>
                                </div>
                                <div class='my-5 md:my-0'>
                                    <x-primary-a
                                        href="{{ route('candidate.index', $notification->data['job_id']) }}">Candidatos</x-primary-a>
                                </div>
                            </li>
                        @empty
                            <p>No hay notificaciones</p>
                        @endforelse

                    </ul>
                </div>
            </div>
        </div>

    </section>

</x-app-layout>
