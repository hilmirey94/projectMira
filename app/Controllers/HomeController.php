<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Models\UserModel;
use App\Models\SettingModel;
use App\Controllers\DateTime;

  
class HomeController extends Controller
{

    public function index()
    {
        // Declare Reading Model
        $readingModel = new ReadingModel();
        $settingModel = new SettingModel();
        $userModel = new UserModel();
        // define session
        $session = session();
        // define page title as 'Home'
        $data['pageTitle'] = 'Home';
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
        // get data using function from reading model page
        $data['scanToday'] = $readingModel->scanToday();
        $data['tempToday'] = $readingModel->tempToday($templow, $temphigh);
        $data['bpmToday'] = $readingModel->bpmToday($bpmlow, $bpmhigh);
        $data['spoToday'] = $readingModel->spoToday($spolow, $spohigh);
        // Past 7 Days
        $data['scan7Days'] = $readingModel->scan7Days();
        $data['temp7Days'] = $readingModel->temp7Days($templow, $temphigh);
        $data['bpm7Days'] = $readingModel->bpm7Days($bpmlow, $bpmhigh);
        $data['spo7Days'] = $readingModel->spo7Days($spolow, $spohigh);
        // Past 30 Days
        $data['scan30Days'] = $readingModel->scan30Days();
        $data['temp30Days'] = $readingModel->temp30Days($templow, $temphigh);
        $data['bpm30Days'] = $readingModel->bpm30Days($bpmlow, $bpmhigh);
        $data['spo30Days'] = $readingModel->spo30Days($spolow, $spohigh);
        // Query reading table for all data
        $data['reading'] = $readingModel->where('date_created >=', date('Y-m-d 00:00:00'))->orderBy('date_created', 'DESC')->findAll();
        // Query reading table for all data
        $data['users'] = $userModel->findAll();
        // Query risky person 
        $data['riskyPerson'] = $readingModel->riskyPerson($templow, $temphigh, $bpmlow, $bpmhigh, $spolow, $spohigh);
        // Query risky person chart
        $data['riskyPersonChart'] = $readingModel->riskyPersonChart($templow, $temphigh, $bpmlow, $bpmhigh, $spolow, $spohigh);
        // Query reading table for average temperature for past 7 days
        $data['tempArray'] = $readingModel->select('date(date_created) as date, AVG(temperature) AS avgtemp')->where('date_created >=', date('Y-m-d 00:00:00', strtotime('-7 days')))->groupBy('DATE(date_created)')->orderBy('date_created', 'ASC')->findAll();
        // Query reading table for average heartrate for past 7 days
        $data['bpmArray'] = $readingModel->select('date(date_created) as date, AVG(bpm) AS avgbpm')->where('date_created >=', date('Y-m-d 00:00:00', strtotime('-7 days')))->groupBy('DATE(date_created)')->orderBy('date_created', 'ASC')->findAll();
        // Query reading table for average oxygen for past 7 days
        $data['spoArray'] = $readingModel->select('date(date_created) as date, AVG(spo2) AS avgspo')->where('date_created >=', date('Y-m-d 00:00:00', strtotime('-7 days')))->groupBy('DATE(date_created)')->orderBy('date_created', 'ASC')->findAll();
        // open home page with above assigned data
        echo view('home', $data);
    }
}