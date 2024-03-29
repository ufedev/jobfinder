<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('show');
    }

    public function index(): View
    {
        //
        // if (!auth()->user()) return redirect()->route('mandioca');
        // $this->authorize('viewAny', Jobs::class);
        return view('jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        $this->authorize('create', Jobs::class);
        return view('jobs.create');
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
    public function show(Jobs $job): View
    {
        //
        // dd($job);

        return view('jobs.show', [
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $job)
    {
        //
        $this->authorize('viewAny', Jobs::class); // Se debe pasar el modelo sobre el cual va a bloquear el acceso en caso de no cumplirse
        $this->authorize('update', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jobs $jobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobs $jobs)
    {
        //
    }
}
