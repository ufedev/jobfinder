<div class='my-5 p-5 flex justify-center'>

    @if (session()->has('message'))
        <p class='p-2 rounded border-[1px] border-green-700 bg-green-100 font-bold text-sm'>
            {{ session('message') }}
        </p>
    @else
        @if ($isCandidate)
            <p class='p-2 rounded border-[1px] border-green-700 bg-green-100 font-bold text-sm'>Ya has postulado a este
                puesto, Exitos!</p>
        @else
            <form wire:submit='apply' class="w-[95%] md:w-1/2 lg:w-2/5">
                <x-input-label>Curriculum vitae</x-input-label>

                <x-text-input type='file' wire:model='cv' accept=".pdf" required />
                @error('cv')
                    <livewire:alert :message="$message" />
                @enderror
                <x-primary-button>
                    {{ __('Postularme') }}
                </x-primary-button>
            </form>
        @endif
    @endif

</div>
