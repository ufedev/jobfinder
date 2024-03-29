<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Candidate;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'rol.user']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Jobs $job): View
    {
        //
        return view('candidates.index', ['job' => $job, 'candidates' => $job->candidates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobs $job)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
