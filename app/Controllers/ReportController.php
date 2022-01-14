<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Controllers\DateTime;

  
class ReportController extends Controller
{

    public function index()
    {
        $readingModel = new ReadingModel();

        $session = session();
        $rfid = $session->get('rfid');
        $name = $session->get('name');
        $data['pageTitle'] = 'Report';
        $data['name'] = $name;
        $data['reading'] = $readingModel->where('rfid', $rfid)->orderBy('date_created', 'DESC')->findAll();
        echo view('report/list.php', $data);
    }
}