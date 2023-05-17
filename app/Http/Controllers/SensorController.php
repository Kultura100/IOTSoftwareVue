<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Device;
use App\Models\Transmitter;
use RecursiveArrayIterator;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;

class SensorController extends Controller
{
    public function wykres2($transmitter)
    {
        $odczyt = $transmitter->getReads()->select('created_at')->get();
        //dd($device->getReads()->get());
        //dd($odczyt);
        $test = [];
        foreach ($odczyt as $jeden) {
            if($jeden->created_at != null)
            //dd($jeden->created_at->format('d-m-y, H:i:s'));
            array_push($test, $jeden->created_at->format('d-m-y, H:i:s'));
        }
        //dd($test);
        return $test;
    }

    public function wykrestemperatury($transmitter)
    {
        $odczyt = $transmitter->getReads()->select('temperature1')->get()->toArray();
        $test = array_merge($odczyt);
        $test = [];
        foreach ($odczyt as $jeden) {
            array_push($test, $jeden['temperature1']);
        }
        return $this->PackWithOptions($test,$this->wykres2($transmitter),"Temperatura");
    }

    public function PackWithOptions($dataarray,$timearray,$label){
        $tmp = [];
        $tmp['labels'] = $timearray;
        $settings = [
            'label' => $label,
            'color' => 'white',
            'fill' => false,
            'borderColor'=> '#d048b6',
            'borderWidth'=> 3,
            'borderDash'=> [],
            'borderDashOffset'=> 0.0,
            'pointBackgroundColor'=> '#d048b6',
            'pointBorderColor'=> 'rgba(255,255,255,0)',
            'pointHoverBackgroundColor'=> '#7678ed',
            'pointBorderWidth'=> 20,
            'pointHoverRadius'=> 4,
            'pointHoverBorderWidth'=> 15,
            'pointRadius'=> 2,
        ];
        $tmp['datasets'][0] = $settings;
        $tmp['datasets'][0]['data'] = $dataarray; 
        return $tmp;
    }

    public function wykreswilgotnosci($transmitter)
    {
        $odczyt = $transmitter->getReads()->select('humidity')->get()->toArray();
        $test = array_merge($odczyt);
        $test = [];
        foreach ($odczyt as $jeden) {
            array_push($test, $jeden['humidity']);
        }
        return $this->PackWithOptions($test,$this->wykres2($transmitter),"Wilgotnosc");
    }


    public function index(Transmitter $id)
    {
        $this->authorize('view', $id);
        $transmitter = Transmitter::where([['user_id', auth()->user()->id],['id', $id->id]])->with('getReceiver')->first();
        $odczyt = $transmitter->getReads()->latest()->first();
        if(isset($odczyt)){
        return Inertia::render('Devices/DeviceInfo', [
            'today' => fn () => $odczyt->created_at->format('d-m-y, H:i:s'),
            'device' => fn () => $transmitter,
            'odczyt' => fn () => $odczyt,
            'wtemp' => fn () => $this->wykrestemperatury($transmitter),
            'whumi' => fn () => $this->wykreswilgotnosci($transmitter),
        ]);
            }
            else
            return Inertia::render('Devices/DeviceInfo', [
                'device' => fn () => $transmitter,
            ]);
    }
}
