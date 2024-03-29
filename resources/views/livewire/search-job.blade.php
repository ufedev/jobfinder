<div>
    <h4 class='text-xl font-medium text-black dark:text-slate-300 mb-2'>Filtrar puestos</h4>
    <form class='w-full flex flex-col md:flex-row items-center gap-2' wire:submit='search_job'>

        <div
            class='flex-1 w-[95%] flex flex-col md:grid md:grid-cols-3 gap-3 items-center text-black dark:text-gray-500 '>
            <x-text-input class='py-1 w-full' placeholder='Busqueda' wire:model='search' />
            <select class='flex-1 w-full dark:bg-gray-900 rounded-lg p-1' wire:model='category'>
                <option value='0' selected>Todas las Categorías</option>
                @foreach ($categories as $category)
                    <option value='{{ $category->id }}'>{{ $category->category }}</option>
                @endforeach
            </select>
            <select class='flex-1 w-full dark:bg-gray-900 rounded-lg p-1' wire:model='salary'>
                <option value='0' selected>Cualquier Salario</option>
                @foreach ($salaries as $salary)
                    <option value='{{ $salary->id }}'>{{ $salary->salary }}</option>
                @endforeach
            </select>
        </div>

        <x-primary-button class="max-w-[95%] md:w-3/12 mt-0">Buscar</x-primary-button>
    </form>{{-- Nothing in the world is as soft and yielding as water. --}}
</div>
