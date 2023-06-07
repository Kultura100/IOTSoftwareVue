<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Gate;
use App\Models\Read;
use Inertia\Inertia;
use App\Models\Camera;
use App\Models\Device;
use App\Models\Receiver;
use App\Models\Transmitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\DeviceAddRequest;
use Illuminate\Support\Facades\Session;

class DeviceController extends Controller
{
    public function test(Request $request)
    {
        $secretkey = "CZZ9zFasPQ";
        if($request['secretkey'] == $secretkey)
        {
            $receivers = Receiver::get();
            foreach ($receivers as $receiver) {
                if ($receiver->receiverId == $request['receiverID']) {
                    $receiver->localip = $request['localip'];
                    $receiver->wifistrength = $request['wifistrength'];
                    $receiver->save();
                }
            }
            $urzadzenia = Transmitter::get();
            foreach ($urzadzenia as $urzadzenie) {
                if ($urzadzenie->transmitterId == $request['deviceID']) {
                    $urzadzenie->batterypercentage = $request['battery'] > 100 ? 100 : $request['battery'];
                    $urzadzenie->save();
                    $odczyt = new Read;
                    $odczyt->humidity = $request['humidity'];
                    $odczyt->temperature1 = $request['temperature'];
                    $odczyt->transmitter_id = $urzadzenie->id;
                    $odczyt->save();
                }
            }
        } 
        return "OK!";  
    }
    public function zmienstanbramy($id){
        $brama = Gate::first();
        $brama->current_id = $id;
        $brama->data = Carbon::now()->timestamp;
        $brama->save();
    }

    public function brama(){
        $brama = Gate::first();
        $dane = [
            'brama' => [
                'status' => $brama->current_id, //1-Otwarcie, 0-Zatrzymanie, -1-Zamkniecie
                'data_godzina' => $brama->data,
            ]
        ];
        
        return response()->json($dane);
    }

    public function index()
    {
        $cameras = Camera::where('user_id', auth()->user()->id)->with('getProtocolName')->get();
        $builder = '';
        foreach ($cameras as $value) {
            $builder .= Crypt::decrypt($value->source) . ':' . $value->port;
            try {
                    if (Http::timeout(1)->withBasicAuth(Crypt::decrypt($value->login), Crypt::decrypt($value->password))->get($builder)->status() == 200) {
                        $value->status_id = 1;
                        $value->save();
                    } else {
                        $value->status_id = 2;
                        $value->save();
                    }
            } catch (\Throwable $th) {
                //throw $th;
            }
            $builder = '';
            // Decrypting values before passing to View
            $value['login'] = Crypt::decrypt($value->login);
            $value['password'] = Crypt::decrypt($value->password);
            $value['source'] = Crypt::decrypt($value->source);
        }
        
        $transmitters = Transmitter::where('user_id', auth()->user()->id)->with('getReceiver')->get();

        $receivers = Receiver::where('user_id', auth()->user()->id)->with('getTransmitters')->get();
        foreach ($receivers as $receiver){//Translate signal
            if (time() - $receiver->updated_at->timestamp < 30 && $receiver->wifistrength != null ) {
                $receiver->status_id = 1;
                $receiver->save();
                $receiver['parsedstrength'] = $receiver->ParseSignal($receiver->wifistrength);
            } else 
            {
                $receiver->status_id = 2;
                $receiver->timestamps = false;
                $receiver->save();
            }
        }
        // poprawić optymalizacyjnie
        foreach ($transmitters as $value) {
           // dump(time() - $value->getReads()->latest()->first()->created_at->timestamp);
            //dd($value->getReads()->latest()->first());
            if(count($value->getReads) > 0)
            if (time() - $value->getReads()->latest()->first()->created_at->timestamp < 30) {
                $value->status_id = 3;
                $value->save();
            } else 
            {
            $value->status_id = 2;
            $value->save();
            }
        }
        
        return Inertia::render('Devices/Devices', ['cameras' => fn () => $cameras, 'receivers' =>  fn () => $receivers]);
    }


    public function store(DeviceAddRequest $request)
    {
        if(count(Transmitter::where('user_id', auth()->user()->id)->get()) <= 4 )
        {
        $input = $request->validated();
        $input['user_id'] = auth()->user()->id;
        $input['status_id'] = 4;
        try {
            Transmitter::create($input);
            return redirect()->route('devices')->with('message', __('translation.messages.transmitteradd'));
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('devices')->with('danger', __('translation.messages.transmitter23000'));
                    break;
                    default:
                    return redirect()->route('devices')->with('danger', __('translation.messages.transmittererror'));
            }
        }
        }  else return redirect()->route('cameras')->with('danger', __('translation.messages.transmitterlimit'));
    }

    public function update(Transmitter $id)
    {
        $this->authorize('update', $id);
        $receivers = Receiver::get();
        return Inertia::render('Devices/DevicesEdit', [
            'transmitter' => fn () => $id,
            'receivers' => fn () => $receivers,
        ]);
    }

    public function edit(DeviceAddRequest $request){
        try {
        Transmitter::find($request->id)->update($request->all());
        } catch (\Illuminate\Database\QueryException $e) {
        \Log::error($e);
        switch($e->getCode()){
            case '23000':
                return redirect()->route('devices')->with('danger', 'Widnieje już urządzenie o podanym identyfikatorze.');
                break;
                default:
                return redirect()->route('devices')->with('danger', 'Wystąpił problem, dodawanie czujnika nie udało się, spróbuj za chwile!');
        }
        }
        return redirect()->route('devices')->with('message', 'Poprawnie edytowano czujnik');
    }
}


