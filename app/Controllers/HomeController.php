<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Controllers\DateTime;

  
class HomeController extends Controller
{

    public function index()
    {
        // Declare Reading Model
        $readingModel = new ReadingModel();
        // define session
        $session = session();
        // define page title as 'Home'
        $data['pageTitle'] = 'Home';
        // get data using function from reading model page
        $data['scanToday'] = $readingModel->scanToday();
        $data['tempToday'] = $readingModel->tempToday();
        $data['bpmToday'] = $readingModel->bpmToday();
        $data['spoToday'] = $readingModel->spoToday();
        // Past 7 Days
        $data['scan7Days'] = $readingModel->scan7Days();
        $data['temp7Days'] = $readingModel->temp7Days();
        $data['bpm7Days'] = $readingModel->bpm7Days();
        $data['spo7Days'] = $readingModel->spo7Days();
        // Past 30 Days
        $data['scan30Days'] = $readingModel->scan30Days();
        $data['temp30Days'] = $readingModel->temp30Days();
        $data['bpm30Days'] = $readingModel->bpm30Days();
        $data['spo30Days'] = $readingModel->spo30Days();
        // Query reading table for all data
        $data['reading'] = $readingModel->where('date_created >=', date('Y-m-d 00:00:00'))->orderBy('date_created', 'DESC')->findAll();
        // Query reading table for average temperature for past 30 days
        $data['tempArray'] = $readingModel->select('date(date_created) as date, AVG(temperature) AS avgtemp')->where('date_created >=', date('Y-m-d 00:00:00', strtotime('-30 days')))->groupBy('DATE(date_created)')->orderBy('date_created', 'ASC')->findAll();
        // Query reading table for average heartrate for past 30 days
        $data['bpmArray'] = $readingModel->select('date(date_created) as date, AVG(bpm) AS avgbpm')->where('date_created >=', date('Y-m-d 00:00:00', strtotime('-30 days')))->groupBy('DATE(date_created)')->orderBy('date_created', 'ASC')->findAll();
        // Query reading table for average oxygen for past 30 days
        $data['spoArray'] = $readingModel->select('date(date_created) as date, AVG(spo2) AS avgspo')->where('date_created >=', date('Y-m-d 00:00:00', strtotime('-30 days')))->groupBy('DATE(date_created)')->orderBy('date_created', 'ASC')->findAll();
        // open home page with above assigned data
        echo view('home', $data);
    }
}