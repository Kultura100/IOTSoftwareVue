<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Device;
use App\Models\Protocol;
use App\Models\Receiver;
use App\Models\DeviceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $receiver = Receiver::where('user_id', auth()->user()->id)->first();
        $receivers = Receiver::where('user_id', auth()->user()->id)->get();
        $protocols = Protocol::get();
        return Inertia::render('Dashboard', [
            'receiver' => fn () => $receiver,
            'receivers' => fn () => $receivers,
        'protocols' => $protocols]);
    }
}
