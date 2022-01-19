<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ReadingModel;
use App\Models\UserModel;
use App\Controllers\DateTime;

  
class ManageReportController extends Controller
{
    public function __construct()
    {
        // define session
        $session = session();
        // get email and user_type of session user
        $email = $session->get('email');
        $access = $session->get('user_type');
        // if session user is not admin then generate access denied message
        if($access != 'admin' && $access != 'staff')
        {
            // print access denied message
            echo '<html><meta name="viewport" content="width=500, initial-scale=1"><body style="margin-top: 40px;"><center>';
            echo '<strong style="color: red; font-size: 24px;">Access Denied!!!</strong><br/><br/>';
            echo 'User with email <strong>\''.$email.'\'</strong> are not authorized to access this page.<br/>';
            echo 'Require access higher than <strong>'.$access.'</strong> level.';
            echo '<p style="margin-top: 50px;"><hr/>'.SITE_NAME.' 2021-2022 - '.SITE_CREATOR.'</p>';
            echo '</center></body></html>';
            // process stop
            die; 
        }

    }

    public function index()
    {
        $readingModel = new ReadingModel();
        $userModel = new UserModel();

        $session = session();
        $rfid = $session->get('rfid');
        $name = $session->get('name');
        $user_type = $session->get('user_type');
        $data['pageTitle'] = 'Manage Report';
        $data['name'] = $name;
        $data['user_type'] = $session->get('user_type');
        $fromDate = $this->request->getVar('fromDate');
        $toDate = $this->request->getVar('toDate');
        if($fromDate != '' && $toDate != ''){
            $data['startDate'] = $fromDate;
            $data['endDate'] = $toDate;
            $data['reading'] = $readingModel->where('date(date_created) >= ', $fromDate)->where('date(date_created) <=', $toDate)->findAll();
        }
        elseif($fromDate != '' && $toDate == '') {
            $data['startDate'] = $fromDate;
            $data['reading'] = $readingModel->where('date(date_created) >= ', $fromDate)->findAll();
        }
        elseif($fromDate == '' && $toDate != ''){
            $data['endDate'] = $toDate;
            $data['reading'] = $readingModel->where('date(date_created) <=', $toDate)->findAll();
        }
        else{
            $data['reading'] = $readingModel->orderBy('date_created', 'DESC')->findAll();
        }
        $data['endDate'] = $toDate;
        $data['user'] = $userModel->select('name,rfid')->findAll();
        $data['rfid'] = $userModel->select('distinct(rfid) as drfid')->orderBy('rfid', 'ASC')->findAll();
        $data['name'] = $userModel->select('distinct(name) as dname')->orderBy('name', 'ASC')->findAll();
        echo view('manage-report/list.php', $data);
    }

    // add report form
    public function create(){
        $data['pageTitle'] = 'Manage Report';
        return view('manage-report/create', $data);
    }
 
    // insert report
    public function store() {
        $readingModel = new ReadingModel();
        $data = [
            'rfid' => $this->request->getVar('rfid'),
            'temperature'  => $this->request->getVar('temperature'),
            'bpm'  => $this->request->getVar('bpm'),
            'spo2'  => $this->request->getVar('spo2'),
        ];
        $readingModel->insert($data);
        return $this->response->redirect(site_url('manage-report'));
    }
    // show single report
    public function singleReport($id = null){
        $data['pageTitle'] = 'Manage Report';
        $readingModel = new ReadingModel();
        $data['report_obj'] = $readingModel->where('id', $id)->first();
        return view('manage-report/edit', $data);
    }
    // update report data
    public function update(){
        $readingModel = new ReadingModel();
        $id = $this->request->getVar('id');
        $data = [
            'rfid' => $this->request->getVar('rfid'),
            'temperature'  => $this->request->getVar('temperature'),
            'bpm'  => $this->request->getVar('bpm'),
            'spo2'  => $this->request->getVar('spo2'),
        ];
        $readingModel->update($id, $data);
        return $this->response->redirect(site_url('manage-report'));
    }

    // delete report
    public function delete($id = null){
        $readingModel = new ReadingModel();
        $data['logs'] = $readingModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('manage-report'));
    }
}