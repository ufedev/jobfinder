<?php

namespace App\Livewire;

// use App\Models\Salary;
use Livewire\Component;
// use App\Models\Category;
use Livewire\Attributes\On; // Los nuevos listeners
use App\Models\Jobs as JobModel;


class Jobs extends Component
{

    // public $jobs;
    public ?string $search = null;
    public ?int $category = null;
    public ?int $salary = null;

    #[On('make_search_result')]
    public function get_search(?string $search, ?int $category, ?int $salary)
    {
        $this->search = $search;
        $this->category = $category;
        $this->salary = $salary;
    }
    public function render()
    {
        // $jobs = JobModel::all();

        $jobs = JobModel::when($this->search, function ($collection) {
            $collection->where('title', 'LIKE', '%' . $this->search . "%");
        })
            ->when($this->search, function ($collection) {
                $collection->orWhere('company', 'LIKE', '%' . $this->search . "%");
            })
            ->when($this->category, function ($collection) {
                $collection->where('category_id', $this->category);
            })
            ->when($this->salary, function ($collection) {
                $collection->where('salary_id', $this->salary);
            })
            ->paginate(10);

        return view('livewire.jobs', ['jobs' => $jobs]);
    }
}
