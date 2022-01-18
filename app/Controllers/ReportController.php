<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Controllers\DateTime;

  
class ReportController extends Controller
{

    public function index()
    {
        // Declare Reading Model
        $readingModel = new ReadingModel();
        // Reading user session data 
        $session = session();
        $rfid = $session->get('rfid');
        $name = $session->get('name');
        // Data to send to view
        // Basic Page Info
        $data['pageTitle'] = 'Report';
        $data['name'] = $name;
        $data['rfid'] = $rfid;
        // query data from reading table where rfid is session user rfid
        $data['reading'] = $readingModel->where('rfid', $rfid)->orderBy('date_created', 'DESC')->findAll();
        // Count normal, low and high Temperature past 30 Days
        $data['tempnormal'] = $readingModel->tempnormal();
        $data['templow'] = $readingModel->templow();
        $data['temphigh'] = $readingModel->temphigh();
        // Count normal, low and high Heartrate past 30 Days
        $data['bpmnormal'] = $readingModel->bpmnormal();
        $data['bpmlow'] = $readingModel->bpmlow();
        $data['bpmhigh'] = $readingModel->bpmhigh();
        // Count normal, low and high Oxygen past 30 Days
        $data['sponormal'] = $readingModel->sponormal();
        $data['spolow'] = $readingModel->spolow();
        $data['spohigh'] = $readingModel->spohigh();
        // open report/list page with above assigned data
        echo view('report/list.php', $data);
    }
}