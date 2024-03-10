<?php

namespace App\Livewire;

use App\Models\Jobs;
use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditJob extends Component
{

    use WithFileUploads;

    #[Validate]
    public $titulo = '';
    public $categoria = '';
    public $salario = '';
    public $empresa = '';
    public $descripcion = '';
    public $fecha;
    public $imagen;

    public function mount(Jobs $job)
    {
        $this->titulo = $job->title;
        $this->categoria = $job->category_id;
        $this->salario = $job->salary_id;
        $this->empresa = $job->company;
        $this->descripcion = $job->description;
        $this->fecha = $job->last_day->format('Y-m-d');
    }


    public function render()
    {

        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-job', [
            'categories' => $categories,
            'salaries' => $salaries
        ]);
    }
}
