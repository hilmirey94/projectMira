<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\LogsModel;
use App\Controllers\DateTime;
  
class LogsController extends Controller
{
    public function __construct()
    {
        // define session
        $session = session();
        // get email and user_type of session user
        $email = $session->get('email');
        $access = $session->get('user_type');
        // if session user is not admin then generate access denied message
        if($access != 'admin')
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
        // Declare Logs Model
        $logsModel = new LogsModel();
        // define session
        $session = session();
        // get rfid and name of session user
        $rfid = $session->get('rfid');
        $name = $session->get('name');
        // define page title as 'Logs'
        $data['pageTitle'] = 'Logs';
        // get name from name variable above
        $data['name'] = $name;
        $fromDate = $this->request->getVar('fromDate');
        $toDate = $this->request->getVar('toDate');
        if($fromDate != null && $toDate != null){
            $data['startDate'] = $fromDate;
            $data['endDate'] = $toDate;
            $data['reading'] = $logsModel->where('date(date_created) >= ', $fromDate)->where('date(date_created) <=', $toDate)->findAll();
        }
        elseif($fromDate != null && $toDate == null) {
            $data['startDate'] = $fromDate;
            $data['reading'] = $logsModel->where('date(date_created) >= ', $fromDate)->findAll();
        }
        elseif($fromDate == null && $toDate != null){
            $data['endDate'] = $toDate;
            $data['reading'] = $logsModel->where('date(date_created) <=', $toDate)->findAll();
        }
        else{
            $data['reading'] = $logsModel->orderBy('date_created', 'DESC')->findAll();
        }
        // open logs/list page with above assigned data
        echo view('logs/list.php', $data);
    }

    // delete user
    public function delete($id = null){
        // Declare Logs Model
        $logsModel = new LogsModel();
        // delete data of requested id
        $data['logs'] = $logsModel->where('id', $id)->delete($id);
        // return to main logs page
        return $this->response->redirect(site_url('logs'));
    }
}