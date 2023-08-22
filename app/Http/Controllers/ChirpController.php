<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChirpRequest;
use App\Http\Requests\UpdateChirpRequest;
use App\Models\Chirp;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View
    {
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->paginate(10),
        ]);
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
    public function store(StoreChirpRequest $request): RedirectResponse
    {
        $request->user()->chirps()->create($request->validated());

        return redirect()->route('chirps.index')->banner('Chirp created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @throws AuthorizationException
     */
    public function edit(Chirp $chirp): Factory|View
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws AuthorizationException
     */
    public function update(UpdateChirpRequest $request, Chirp $chirp): RedirectResponse
    {
        $this->authorize('update', $chirp);

        $chirp->update($request->validated());

        return redirect()->route('chirps.index')->banner('Chirp updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws AuthorizationException
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect()->route('chirps.index')->banner('Chirp deleted!');
    }
}
