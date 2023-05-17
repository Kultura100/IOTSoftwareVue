<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\TimeTable;
use App\Models\Transmitter;
use Illuminate\Http\Request;
use App\Http\Requests\TimeTableAddRequest;

class SettingsController extends Controller
{
    public function timetable(){
        $timetables = TimeTable::where('user_id', auth()->user()->id)->get();
        foreach($timetables as $item)
        {
            $item['device'] = Transmitter::where([['id',$item->device_id],['user_id', auth()->user()->id]])->first();
            if($item->frequency_params != null)
            if($item->frequency_params == 'weeklyOn')
            {
                $item['dzien'] = $this->getDay(unserialize($item->frequency_params)[0]);
                $item['czas'] = unserialize($item->frequency_params)[1];
            } else{
                $item['dzien'] = unserialize($item->frequency_params)[0];
                $item['czas'] = unserialize($item->frequency_params)[1];
            }
        }
        return Inertia::render('Devices/TimeTable', [
            'timetables' => $timetables,
        ]);
    }

    public function delete(TimeTable $id){
        $id->delete();
        return redirect()->route('timetable')->with('message', __('translation.messages.tasktabledelete'));
    }

    public function getDay($number){
        switch ($number) {
        case 1:
            return "Poniedziałek";
        break;
        case 2:
            return "Wtorek";
        break;
        case 3:
            return "Środa";
        break;
        case 4:
            return "Czwartek";
        break;
        case 5:
            return "Piątek";
        break;
        case 6:
            return "Sobota";
        break;
        case 7:
            return "Niedziela";
        break;
    }
    }

    public function store(TimeTableAddRequest $request){

        $param = null;
        if($request->day != null && $request->time != null)
        {
            $param = serialize(array($request->day, $request->time));
        } else if ($request->month != null && $request->time)
        {
            $param = serialize(array($request->month, $request->time)); 
        }
        $test =TimeTable::create([
            'type' => $request->type,
            'frequency_function' => $request->frequency_function,
            'frequency_params'=> $param,
            'command_name' => 'emails:send',
            'user_id' => auth()->user()->id,
            'device_id' => $request->device_id,
        ]);
        return redirect()->route('timetable')->with('message', __('translation.messages.tasktableadd'));
    }

    public function timetableadd(Transmitter $id = null){
        $actualmonth = Carbon::now()->daysInMonth;
        $transmitters = Transmitter::where('user_id', auth()->user()->id)->get();
        if(!empty($id)){
            return Inertia::render('Devices/TimeTableAdd', [
                'actualmonth' => $actualmonth,
                'transmitters' => $transmitters,
                'actualtransmitter' => $id,
            ]);  
        }else //jak pusty
        return Inertia::render('Devices/TimeTableAdd', [
            'actualmonth' => $actualmonth,
            'transmitters' => $transmitters,
        ]);
    }

    public function changeLocale(Request $request){
        $language = $request->language ?? 'pl';
        $request->session()->put('selected_language', $language);
    }
}
