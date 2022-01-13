<?php

namespace App\Controllers;

class TemperatureController extends BaseController
{
    public function index()
    {
        $data['pageTitle'] = 'Temperature Reading';
        return view('temperature/index', $data);
    }
}
