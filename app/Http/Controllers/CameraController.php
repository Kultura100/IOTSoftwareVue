<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Read;
use Inertia\Inertia;
use App\Models\Camera;
use App\Models\Device;
use App\Models\Protocol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\CameraAddRequest;

class CameraController extends Controller
{
    public function index()
    {
        $camera = Camera::where('user_id', auth()->user()->id)->get();
        foreach ($camera as $item) {
            // Decrypting values before passing to View
            $item['login'] = Crypt::decrypt($item->login);
            $item['password'] = Crypt::decrypt($item->password);
            $item['source'] = Crypt::decrypt($item->source);
        }
        return Inertia::render('Camera/Camera',[
            'camera' => $camera->load('getProtocolName')
        ]);
    }

    
    public function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function camerainfo(Camera $camera){
        $this->authorize('view', $camera);
        try {
            //code...
        $camera['now'] = Carbon::now()->format('Y-m-d H:i:s');
        $builder = Crypt::decrypt($camera->source) . ':' . $camera->port .'/get_status.cgi';
        $test = Http::withDigestAuth(Crypt::decrypt($camera->login), Crypt::decrypt($camera->password))->get($builder);
        //dd($test->body());
        $wynik = [];
        $wynik2 = [];
        $test = explode("\r\n",$test->body());
        foreach ($test as $key) {
            $key = str_replace("var ","",$key);
            array_push($wynik, $key);
        }

        $zapytanie = Http::withDigestAuth(Crypt::decrypt($camera->login), Crypt::decrypt($camera->password))->get(Crypt::decrypt($camera->source) . ':' . $camera->port .'/get_camera_params.cgi');
        //dd($zapytanie->body());
        $zapytanie = explode("\r\n",$zapytanie->body());
        foreach ($zapytanie as $key) {
            $key = str_replace("var ","",$key);
            array_push($wynik2, $key);
        }

        //dd($wynik);
        return Inertia::render('Camera/CameraInfo', ['cameradetails' => $wynik, 'cameradetails2' => $wynik2 , 'odczyt' => $camera]);
    } catch (\Throwable $th) {
        return redirect()->route('devices')->with('danger', __('translation.messages.cameracantconnect')); 
    }
    }


    public function store(CameraAddRequest $request)
    {
        if(count(Camera::where('user_id', auth()->user()->id)->get()) <= 3 )
        {
        $input = $request->validated();
        $input['source'] = Crypt::encrypt($request->source);
        $input['login'] = Crypt::encrypt($request->login);
        $input['password'] = Crypt::encrypt($request->password);
        $input['user_id'] = auth()->user()->id;
        $input['status_id'] = 4;
        Camera::create($input);
        return redirect()->route('cameras')->with('message', __('translation.messages.cameraadd'));
        }
        else return redirect()->route('cameras')->with('danger', __('translation.messages.cameralimit'));
    }

    public function update(Camera $camera)
    {
        $this->authorize('update', $camera);
            $camera['source'] = Crypt::decrypt($camera->source);
            $camera['login'] = Crypt::decrypt($camera->login);
            $camera['password'] = Crypt::decrypt($camera->password);
            $protocols = Protocol::get();
            return Inertia::render('Camera/CameraEdit', [
                'camera' => fn () => $camera,
                'protocols' => fn () => $protocols,
            ]);
    }

    public function edit(CameraAddRequest $request){
        Camera::find($request->id)->update([
            'name' => $request->name,
            'port' => $request->port,
            'source' => Crypt::encrypt($request->source),
            'login' => Crypt::encrypt($request->login),
            'password' => Crypt::encrypt($request->password),
            'protocol_id' => $request->protocol_id,
            'status_id' => 4,
        ]);
        return redirect()->route('devices')->with('message', __('translation.messages.cameraedit'));
    }


}
