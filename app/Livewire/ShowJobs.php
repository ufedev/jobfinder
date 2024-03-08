<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Jobs;

class ShowJobs extends Component
{

    // public $jobs = [];

    public function render()
    {

        $jobs = Jobs::where('user_id', auth()->user()->id)->paginate(10);


        return view(
            'livewire.show-jobs',
            ['jobs' => $jobs]
        );
    }
}
