<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Receiver;
use Illuminate\Http\Request;
use App\Http\Requests\ReceiverAddRequest;

class ReceiverController extends Controller
{
    public function store(ReceiverAddRequest $request)
    {
        try {
        $input = $request->validated();
        $input['user_id'] = auth()->user()->id;
        $input['status_id'] = 4;
        Receiver::create($input);
        return redirect()->route('devices')->with('message', __('translation.messages.receiveradd'));
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('devices')->with('danger', __('translation.messages.receiver23000'));
                    break;
                    default:
                    return redirect()->route('devices')->with('danger', __('translation.messages.receivererror'));
            }
        }
    }

    public function update(Receiver $id)
    {
        $this->authorize('update', $id);
        return Inertia::render('Receiver/ReceiverEdit', [
            'receiver' => fn () => $id,
        ]);
    }

    public function edit(ReceiverAddRequest $request){
        Receiver::find($request->id)->update($request->all());
        return redirect()->route('devices')->with('message', __('translation.messages.receiveredit'));
    }
}
