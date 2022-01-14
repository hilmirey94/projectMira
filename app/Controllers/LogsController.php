<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\LogsModel;
use App\Controllers\DateTime;

  
class LogsController extends Controller
{

    public function index()
    {
        $logsModel = new LogsModel();

        $session = session();
        $rfid = $session->get('rfid');
        $name = $session->get('name');
        $data['pageTitle'] = 'Logs';
        $data['name'] = $name;
        $data['reading'] = $logsModel->orderBy('date_created', 'DESC')->findAll();
        echo view('logs/list.php', $data);
    }

    // delete user
    public function delete($id = null){
        $logsModel = new LogsModel();
        $data['logs'] = $logsModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('logs'));
    }
}