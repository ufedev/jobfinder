<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Salary;

class SearchJob extends Component
{
    public $search;
    public $category;
    public $salary;



    public function search_job()
    {
        $this->dispatch('make_search_result', $this->search, $this->category, $this->salary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.search-job', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
