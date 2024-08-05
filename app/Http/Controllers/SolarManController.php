<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolarManController extends Controller
{
    protected $solarManService;

    public function __construct(SolarMan $solarManService)
    {
        $this->solarManService = $solarManService;
    }

    public function getData(Request $request)
    {
        $endpoint = $request->input('endpoint');
        $params = $request->input('params', []);

        $data = $this->solarManService->getData($endpoint, $params);

        return response()->json($data);
    }
}
