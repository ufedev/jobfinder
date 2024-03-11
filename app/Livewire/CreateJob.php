<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
// use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Models\Jobs;

class CreateJob extends Component
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


    public function rules()
    {

        return [
            "titulo" => 'required',
            "categoria" => "required",
            "salario" => "required",
            "empresa" => "required",
            "descripcion" => "required|min:15",
            "fecha" => 'required',
            "imagen" => 'required|image|max:4096'

        ];
    }



    public function save()
    {
        // Validate data
        $validate = $this->validate();
        // Store image
        $image_stored = $this->imagen->store('public/jobs_image');
        $validate['imagen'] = str_replace('public/jobs_image/', '', $image_stored);
        // Create Job

        Jobs::create([
            'title' => $validate['titulo'],
            'category_id' => $validate['categoria'],
            'salary_id' => $validate['salario'],
            'company' => $validate['empresa'],
            'description' => $validate['descripcion'],
            'image' => $validate['imagen'],
            'last_day' => $validate['fecha'],
            'user_id' => auth()->user()->id

        ]);
        // Set a message

        session()->flash('message', 'Vacante creada con exito');

        // Return to Dashboard

        return redirect()->route('jobs.index');
    }
    public function render()
    {

        $salaries = Salary::all();
        $categories = Category::all();


        return view('livewire.create-job', ['salaries' => $salaries, 'categories' => $categories]);
    }
}
