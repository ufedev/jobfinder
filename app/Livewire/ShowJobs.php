<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Jobs;
use Livewire\Attributes\On;

class ShowJobs extends Component
{

    // public $jobs = [];

    // protected $listeners = ['prueba'];

    #[On('delete_server')]
    public function delete($jobId)
    {
        Jobs::find($jobId)->delete();
    }


    public function render()
    {

        $jobs = Jobs::where('user_id', auth()->user()->id)->paginate(10);


        return view(
            'livewire.show-jobs',
            ['jobs' => $jobs]
        );
    }
}
