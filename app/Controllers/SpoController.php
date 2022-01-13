<?php

namespace App\Controllers;

class SpoController extends BaseController
{
    public function index()
    {
        $data['pageTitle'] = 'Oxygen Reading';
        return view('spo/index', $data);
    }
}
