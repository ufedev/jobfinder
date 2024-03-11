<?php

namespace App\Livewire;

use App\Models\Jobs;
use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EditJob extends Component
{

    use WithFileUploads;

    #[Validate]
    public $id;
    public $titulo = '';
    public $categoria = '';
    public $salario = '';
    public $empresa = '';
    public $descripcion = '';
    public $fecha;
    public $imagen;
    public $nueva_imagen;


    public function rules()
    {

        return [
            "titulo" => 'required',
            "categoria" => "required",
            "salario" => "required",
            "empresa" => "required",
            "descripcion" => "required|min:15",
            "fecha" => 'required',
            'nueva_imagen' => 'nullable|image|max:4096'


        ];
    }
    public function mount(Jobs $job)
    {
        $this->id = $job->id;
        $this->titulo = $job->title;
        $this->categoria = $job->category_id;
        $this->salario = $job->salary_id;
        $this->empresa = $job->company;
        $this->descripcion = $job->description;
        $this->imagen = $job->image;
        $this->fecha = $job->last_day->format('Y-m-d');
    }


    public function save()
    {
        $validate = $this->validate();
        // Store image

        if ($this->nueva_imagen) {
            $old_image =  $this->imagen;

            $new_name_store = $this->nueva_imagen->store("public/jobs_image");
            $validate['imagen'] = str_replace("public/jobs_image/", "", $new_name_store);
            Storage::delete('public/jobs_image/' . $old_image);
        }

        $job = Jobs::find($this->id);
        $job->title = $validate['titulo'];
        $job->category_id = $validate['categoria'];
        $job->salary_id = $validate['salario'];
        $job->company = $validate['empresa'];
        $job->description = $validate['descripcion'];
        $job->last_day = $validate['fecha'];

        $job->image = $validate['imagen'] ?? $this->imagen;
        $job->save();

        // ]);
        // Set a message

        session()->flash('message', 'Vacante modificada con éxito');

        // Return to Dashboard

        return redirect()->route('jobs.index');
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
