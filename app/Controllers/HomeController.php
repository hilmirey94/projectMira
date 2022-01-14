<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Controllers\DateTime;

  
class HomeController extends Controller
{

    public function index()
    {
        $readingModel = new ReadingModel();

        $session = session();
        $data['pageTitle'] = 'Home';
        $data['scanToday'] = $readingModel->scanToday();
        $data['tempToday'] = $readingModel->tempToday();
        $data['bpmToday'] = $readingModel->bpmToday();
        $data['spoToday'] = $readingModel->spoToday();
        $data['reading'] = $readingModel->where('date_created >=', date('Y-m-d 00:00:00'))->orderBy('date_created', 'DESC')->findAll();
        echo view('home', $data);
    }
}