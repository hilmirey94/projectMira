<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Models\SettingModel;
use App\Controllers\DateTime;

  
class ReportController extends Controller
{

    public function index()
    {
        // Declare Reading & setting Model
        $readingModel = new ReadingModel();
        $settingModel = new SettingModel();
        // Reading user session data 
        $session = session();
        $rfid = $session->get('rfid');
        $name = $session->get('name');
        // get value from setting model
        $tlow = $settingModel->where('name','templow')->first();
        $thigh = $settingModel->where('name','temphigh')->first();
        $blow = $settingModel->where('name','bpmlow')->first();
        $bhigh = $settingModel->where('name','bpmhigh')->first();
        $slow = $settingModel->where('name','spolow')->first();
        $shigh = $settingModel->where('name','spohigh')->first();
        // declare value into variable
        $templow = $tlow['value'];
        $temphigh = $thigh['value'];
        $bpmlow = $blow['value'];
        $bpmhigh = $bhigh['value'];
        $spolow = $slow['value'];
        $spohigh = $shigh['value'];
        // Data to send to view
        // Basic Page Info
        $data['pageTitle'] = 'Report';
        $data['name'] = $name;
        $data['rfid'] = $rfid;
        // query data from reading table where rfid is session user rfid
        $data['reading'] = $readingModel->where('rfid', $rfid)->orderBy('date_created', 'DESC')->findAll();
        // Count normal, low and high Temperature past 30 Days
        $data['tempnormal'] = $readingModel->tempnormal($templow, $temphigh);
        $data['templow'] = $readingModel->templow($templow);
        $data['temphigh'] = $readingModel->temphigh($temphigh);
        // Count normal, low and high Heartrate past 30 Days
        $data['bpmnormal'] = $readingModel->bpmnormal($bpmlow, $bpmhigh);
        $data['bpmlow'] = $readingModel->bpmlow($bpmlow);
        $data['bpmhigh'] = $readingModel->bpmhigh($bpmhigh);
        // Count normal, low and high Oxygen past 30 Days
        $data['sponormal'] = $readingModel->sponormal($spolow, $spohigh);
        $data['spolow'] = $readingModel->spolow($spolow);
        $data['spohigh'] = $readingModel->spohigh($spohigh);
        // open report/list page with above assigned data
        echo view('report/list.php', $data);
    }
}