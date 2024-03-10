{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
<form class='w-full max-w-md flex flex-col gap-5' wire:submit.prevent="save">
    <div>
        <x-input-label for="titulo" :value="__('Titulo')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model.blur="titulo" :value="old('titulo')"
            placeholder='Titulo del trabajo' autofocus />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select wire:model.live='categoria' id="categoria"
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full'>
            <option value=''>-- Seleccione --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        @error('categoria')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror
    </div>
    <div>
        <x-input-label for="salario" :value="__('Salario')" />
        <select wire:model.live='salario' id="salario"
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full'>
            <option value=''>-- Seleccione --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:alert :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model.blur="empresa"
            placeholder="Empresa, Ej: Netflix, Amazon, Google" :value="old('empresa')" />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripción')" />
        <textarea wire:model.live="descripcion" id="descripcion" placeholder="Descripción del trabajo"
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72'></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="fecha" :value="__('Ultimo día para postularse')" />
        <x-text-input id="fecha" class="block mt-1 w-full" type="date" wire:model="fecha" :value="old('fecha')"
            autofocus />
        <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" autofocus
            accept="image/*" />
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>
    <div class='my-5 w-60'>
        @if ($imagen)
            <img src="{{ $imagen->temporaryUrl() }}" />
        @endif
    </div>

    <x-primary-button class='mt-5'>
        Editar
    </x-primary-button>
</form>
