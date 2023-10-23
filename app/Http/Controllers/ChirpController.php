<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class ChirpController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('chirps.index', [
            'chirps' => auth()->user()->currentTeam->chirps()->latest()->get(),
            'user' => $user
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // First Way to checking the checkEligibility
        if (Gate::denies('create', Chirp::class)) {
            return redirect()->back()->dangerBanner('You have reached the maximum chirp creation limit. Please upgrade your plan.');
        }

        // Second Way to checking the checkEligibility
        // $chirpCount = $user->currentTeam->chirps()->count();

        // if (!$user->checkEligibility('max_chirps', $chirpCount)) {
        //     // User has reached the chirp creation limit, handle accordingly
        //     return redirect()->back()->with("error", "You have reached the maximum chirp creation limit. Please upgrade your plan.");
        // }

        $chirp = new Chirp();
        $chirp->message = $validated['message'];
        $chirp->team_id = auth()->user()->currentTeam->id;
        $chirp->user_id = auth()->id();
        $chirp->save();

        return redirect(route('chirps.index'))->banner('Chirp successfully created.');
    }

    public function edit(Chirp $chirp): View
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    public function destroy(Chirp $chirp): RedirectResponse
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}
