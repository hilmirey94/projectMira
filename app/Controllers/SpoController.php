<?php

namespace App\Controllers;
use App\Models\ReadingModel;
use App\Controllers\DateTime;

class SpoController extends BaseController
{
    public function index()
    {
        $readingModel = new ReadingModel();

        $session = session();
        $data['name'] = $session->get('name');
        $data['rfid'] = $session->get('rfid');
        $data['pageTitle'] = 'Oxygen Page';
        $data['reading'] = $readingModel->where('rfid', $session->get('rfid'))->orderBy('date_created', 'DESC')->findAll();
        return view('spo/index', $data);
    }
}
