<?php

namespace App\Http\Controllers;

use Exception;
use Inertia\Inertia;
use App\Mail\SendBugMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NavigationController extends Controller
{
    public function getAuth()
    {
        return response()->json([
            'auth' => auth()->user(),
        ], 200);
    }

    public function sendpacket()
    {
        phpinfo();

    }

    public function reportbug(){
        return Inertia::render('ContactForm');
    }

    public function sendbug(Request $request){
        $validatedData = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);
        //dd($validatedData);
        $data = [
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'url' => env('APP_URL'),
        ];

        Mail::to(env('MAIL_USERNAME'))->send(new SendBugMail($data));

        return redirect()->route('dashboard')->with('message', __('translation.messages.raportsend'));
    }
}
