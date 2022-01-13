<?php

namespace App\Controllers;

class BpmController extends BaseController
{
    public function index()
    {
        $data['pageTitle'] = 'Heartbeat Reading';
        return view('bpm/index', $data);
    }
}
