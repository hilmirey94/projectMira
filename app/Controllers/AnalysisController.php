<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Models\SettingModel;
use App\Controllers\DateTime;

  
class AnalysisController extends Controller
{

    public function index()
    {
        // Declare Reading & setting Model
        $readingModel = new ReadingModel();
        $settingModel = new SettingModel();
        // Reading user session data 
        $session = session();
        $rfid = $session->get('rfid');
        $data['pageTitle'] = 'Analysis';
        $data['rfid'] = $session->get('rfid');
        $data['name'] = $session->get('name');
        $reqdays = $this->request->getVar('days');
        if($reqdays != null){
            $days = $reqdays;
        }else{
            $days = null;
        }
        $data['days'] = $days;
        $fromDate = $this->request->getVar('fromDate');
        $toDate = $this->request->getVar('toDate');
        if($fromDate != '' && $toDate != ''){
            $data['startDate'] = $fromDate;
            $data['endDate'] = $toDate;
            $data['dataArray'] = $readingModel->select('date_created as date, temperature, bpm, spo2')->where('rfid', $rfid)->where('date(date_created) >=', $fromDate)->where('date(date_created) <=', $toDate)->orderBy('date_created', 'ASC')->findAll();
        }
        elseif($fromDate != '' && $toDate == '') {
            $data['startDate'] = $fromDate;
            $data['dataArray'] = $readingModel->select('date_created as date, temperature, bpm, spo2')->where('rfid', $rfid)->where('date(date_created) >=', $fromDate)->orderBy('date_created', 'ASC')->findAll();
        }
        elseif($fromDate == '' && $toDate != ''){
            $data['endDate'] = $toDate;
            $data['dataArray'] = $readingModel->select('date_created as date, temperature, bpm, spo2')->where('rfid', $rfid)->where('date(date_created) <=', $toDate)->orderBy('date_created', 'ASC')->findAll();
        }
        else{
            $data['dataArray'] = $readingModel->select('date_created as date, temperature, bpm, spo2')->where('rfid', $rfid)->where('date_created >=', date('Y-m-d 00:00:00', strtotime('-7 days')))->orderBy('date_created', 'ASC')->findAll();
        }
        // Query reading table for average temperature for past 7 days
        echo view('analysis/list.php', $data);
    }
}