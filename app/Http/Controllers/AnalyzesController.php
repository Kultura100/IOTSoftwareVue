<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Raport;
use Illuminate\Http\Request;

class AnalyzesController extends Controller
{
    public function index()
    {
        $raports = Raport::where('user_id', auth()->user()->id)->get();
        $time = Carbon::now()->format('Y-m-d H:i:s'); 
        return Inertia::render('Devices/Raports', [
            'raports' => fn () => $raports,
        'time' => $time]);
    }
}
