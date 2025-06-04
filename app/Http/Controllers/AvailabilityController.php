<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function index()
{
    $availabilities = Availability::where('user_id', auth()->id())->get();
    return Inertia::render('Dashboard', ['availabilities' => $availabilities]);
}

public function store(Request $request)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'number_of_guests' => 'required|integer|min:1',
    ]);
$start = Carbon::parse($request->start_date)->startOfDay();
$end = Carbon::parse($request->end_date)->startOfDay();






    Availability::create([
        'user_id' => auth()->id(),
        'start_date' => $start,
        'end_date' => $end,
        'number_of_guests' => $request->number_of_guests,
    ]);

    return redirect()->route('dashboard');
}
}
