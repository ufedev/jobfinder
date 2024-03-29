<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Jobs;
use App\Models\Candidate;
use App\Notifications\NewCandidate;

class ApplyJob extends Component
{
    use WithFileUploads;

    #[Validate]
    public $cv;
    public $job;
    public $isCandidate;
    // public $candidate;

    public function mount(Jobs $job)
    {
        $this->job = $job;
        $this->isCandidate = $job->isApplied(auth()->user()->id);

        //! difficult way and not efficient
        // $this->candidate = Candidate::where('job_id', $job->id)->get();
        // foreach ($this->candidate as $candidate) {
        //     if ($candidate->candidate_id === auth()->user()->id) {
        //         $this->isCandidate = true;
        //     }
        // }
    }
    public function rules()
    {
        return [
            'cv' => "required|mimes:pdf"
        ];
    }
    public function render()
    {
        // dd('hola');
        return view('livewire.apply-job');
    }

    public function apply()
    {
        $validate = $this->validate();

        // Save CV 
        $cv = $this->cv->store('public/cv');
        $validate['cv'] = str_replace('public/cv/', '', $cv);


        // Save Candidate to this Job
        $this->job->candidates()->create([
            'candidate_id' => auth()->user()->id,
            'cv' => $validate['cv']
        ]);

        // notify to recluiter

        $this->job->recluiter->notify(new NewCandidate($this->job->id, $this->job->title, auth()->user()->id));

        session()->flash('message', 'Has aplicado! Suerte con la busqueda.');

        return redirect()->back();
    }
}
